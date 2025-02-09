<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\RecomendacaoRequest;
use App\Http\Requests\RecomendacaoPart2Request;

use App\Models\Recomendacao;
use App\Models\AnalisesSolo;
use App\Models\Culturas;
use App\Models\DisponibilidadeFosforoPotassio;
use App\Models\DemandaMacronutrienteCultura;
use App\Models\AcrescimoRendimentoCulturas;
use App\Models\DemandaNitrogenioCultura;
use App\Models\RecomendacaoNPK;
use App\Models\AdubosMateriaPrima;
use App\Models\RecomendacaoAdubacao;
use App\Models\RecomendacaoCalagem;


use DataTables;


class RecomendacaoController extends Controller
{
    
    public $sistema_cultivo = "Plantio direto consolidado";

    public function index(Request $request)
    {  
    }

    public function create($idAnalise): View
    {   
        $culturas = Culturas::all();
        return view('recommendations.cadastro', compact('culturas'))->with('idAnalise', $idAnalise);
    }

    public function store(RecomendacaoRequest $request, $idAnalise)
    {
        $request->validated();

        $recomendacao = Recomendacao::create([
            'analise_id' => $idAnalise,
            'identificador' => $request->identificador,
            'prnt' => $request->prnt,
            'cultura_id' => $request->cultura,
            'expectativa_rendimento' => $request->expectativa_rendimento,
            'sistema_cultivo' => $this->sistema_cultivo,
            'cultivo' => $request->cultivo,
            'cultura_anterior' => $request->cultura_anterior,
        ]);

        $necessidade_NPK = $this->calcularNPK($recomendacao->id);

        $recomendacao_npk = RecomendacaoNPK::create([
            'necessidade_nitrogenio' => $necessidade_NPK['N']['valor'],
            'necessidade_fosforo' => $necessidade_NPK['P']['valor'],
            'necessidade_potassio' => $necessidade_NPK['K']['valor'],
            'recomendacao_id' => $recomendacao->id
        ]);

        $necessidade_calagem = $this->calcularNecessidadeCalagem($idAnalise);

        $calagem = RecomendacaoCalagem::create([
            'necessidade_calagem' => is_null($necessidade_calagem) ? null : round($necessidade_calagem, 2),
            'recomendacao_id' => $recomendacao->id
        ]);

        return redirect()->route('recommendations.create-part2', ['id' => $recomendacao->id, 'idAnalise' => $idAnalise])->with('errors');
    }

    public function create_part2($recomendacao_id, $idAnalise)
    {
        $data = Recomendacao::from('recomendacao as r')
            ->join('recomendacao_npk as ra', 'ra.recomendacao_id', '=', 'r.id')
            ->select('r.id as recomendacao_id', 'r.cultura_id', 'r.analise_id', 'ra.necessidade_nitrogenio', 'ra.necessidade_potassio', 'ra.necessidade_fosforo')
            ->where('r.id', '=', $recomendacao_id)
            ->first();

        $adubos_materia_prima = AdubosMateriaPrima::join('macronutrientes as m', 'm.id', '=', 'adubos_materia_prima.macronutriente_id')
            ->select('adubos_materia_prima.*', 'm.nome as macronutriente')->get();

        if ($data) {
            return view('recommendations.cadastro-part2')->with(['data' => $data, 'adubos' => $adubos_materia_prima]);
        }

        return redirect()->route('recommendations.create', ['id' => $idAnalise])->with(['error' => 'ooo', 'idAnalise' => $idAnalise]);

    }

    public function store_part2(RecomendacaoPart2Request $request, $recomendacao_id, $idAnalise)
    {
        $request->validated();

        $quantidade_adubos_materia_prima = $this->calcularAdubosMateriaPrima($request, $recomendacao_id);

        $recomendacao_adubacao = RecomendacaoAdubacao::create([
            'nitrogenio' => $quantidade_adubos_materia_prima['N'],
            'fosforo' => $quantidade_adubos_materia_prima['P'],
            'potassio' => $quantidade_adubos_materia_prima['K'],
            'adubo_nitrogenio_id' => $request->adubo_nitrogenio != '-' ? $request->adubo_nitrogenio : null,
            'adubo_fosforo_id' => $request->adubo_fosforo != '-' ? $request->adubo_fosforo : null,
            'adubo_potassio_id' => $request->adubo_potassio != '-' ? $request->adubo_potassio : null,
            'recomendacao_id' => $recomendacao_id
        ]);

        return Redirect::route('recommendations.show', $recomendacao_id);
    }

    public function show($idRecomendacao)
    {
        try {
            $data = Recomendacao::from('recomendacao as r')
                ->select('r.id', 'r.created_at', 'r.expectativa_rendimento', 'r.analise_id', 'r.sistema_cultivo', 'r.cultivo', 'r.cultura_anterior', 'r.prnt', 'npk.necessidade_nitrogenio as n', 'npk.necessidade_potassio as k', 
                'npk.necessidade_fosforo as p', 'amp_p.nome as adubo_fosforo', 'amp_n.nome as adubo_nitrogenio', 'amp_k.nome as adubo_potassio', 'c.cultura',
                'adub.nitrogenio as qtd_nitrogenio_adub', 'adub.potassio as qtd_potassio_adub', 'adub.fosforo as qtd_fosforo_adub', 'calagem.necessidade_calagem')
                ->join('culturas as c', 'c.id', '=', 'r.cultura_id')
                ->leftJoin('recomendacao_npk as npk', 'npk.recomendacao_id', '=', 'r.id')
                ->leftJoin('recomendacao_adubacao as adub', 'adub.recomendacao_id', '=', 'r.id')
                ->leftJoin('recomendacao_calagem as calagem', 'calagem.recomendacao_id', '=', 'r.id')
                ->leftJoin('adubos_materia_prima as amp_n', 'amp_n.id', '=', 'adub.adubo_nitrogenio_id')
                ->leftJoin('adubos_materia_prima as amp_p', 'amp_p.id', '=', 'adub.adubo_fosforo_id')
                ->leftJoin('adubos_materia_prima as amp_k', 'amp_k.id', '=', 'adub.adubo_potassio_id')
                ->where('r.id', '=', $idRecomendacao)
                ->first();
                        
            return view('recommendations.recomendacao-info')->with('data', $data);
        } catch (\Exception $e) {
            return back();

        }
    }

    public function edit(string $id)
    {
        try {

            $culturas = Culturas::all();    
            $data = Recomendacao::from('recomendacao as r')
                ->select('r.id', 'r.created_at', 'r.expectativa_rendimento', 'r.analise_id',
                'r.sistema_cultivo', 'r.cultivo', 'r.cultura_anterior', 'r.prnt', 'c.cultura')
                ->join('culturas as c', 'c.id', '=', 'r.cultura_id')
                ->where('r.id', '=', $idRecomendacao)
                ->first();

            return view('recommendations.cadastro', compact('culturas', 'data'))->with('idAnalise', $idAnalise);    

        } catch(\Exception $e) {
            return back();
        }
    }

    public function update(AnalisesSoloRequest $request, $id)
    {
    }

    public function destroy($id)
    {
        try {
            $recomendacao_adubacao = RecomendacaoAdubacao::where('recomendacao_id', $id)->delete();
            $recomendacao_calagem = RecomendacaoCalagem::where('recomendacao_id', $id)->delete();
            $recomendacao_npk = RecomendacaoNPK::where('recomendacao_id', $id)->delete();
            $recomendacao = Recomendacao::where('id', $id)->delete();

            return redirect()->route('analysis.index')->with('success', 'Recomendação de adubação e calagem excluída com sucesso.');    
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function calcularNPK($idRecomendacao)
    {
        try {

            $recomendacao = Recomendacao::where('id', $idRecomendacao)->first();
            $analise = AnalisesSolo::where('id', $recomendacao->analise_id)->first();

            $fosforo = $analise->fosforo;
            $potassio = $analise->potassio;
            $argila = $analise->argila;
            $ctc_solo = $analise->ctc_solo;
            $mat_org = $analise->materia_organica;
            $cultura_anterior = strtoupper($recomendacao->cultura_anterior);
   
            $disponibilidade_fosforo = DisponibilidadeFosforoPotassio::from('disponibilidade_fosforo_potassio as dfp')
                ->join('macronutrientes as m', 'm.id', '=', 'dfp.macronutriente_id')
                ->where('dfp.teor_maximo', '>=', $argila)
                ->where('dfp.teor_minimo', '<', $argila)
                ->where('dfp.valor_maximo', '>=', $fosforo)
                ->where('dfp.valor_minimo', '<=', $fosforo)
                ->where('m.nome', '=', 'Fósforo')
                ->first();

            $disponibilidade_potassio = DisponibilidadeFosforoPotassio::from('disponibilidade_fosforo_potassio as dfp')
                ->join('macronutrientes as m', 'm.id', '=', 'dfp.macronutriente_id')
                ->where('dfp.teor_maximo', '>=', $ctc_solo)
                ->where('dfp.teor_minimo', '<', $ctc_solo)
                ->where('dfp.valor_maximo', '>=', $potassio)
                ->where('dfp.valor_minimo', '<=', $potassio)
                ->where('m.nome', '=', 'Potássio')
                ->first();

            $demanda_fosforo = DemandaMacronutrienteCultura::from('demanda_macronutriente_cultura as dmc')
                ->join('culturas as c', 'dmc.cultura_id', '=', 'c.id')
                ->join('macronutrientes as m', 'm.id', '=', 'dmc.macronutriente_id')
                ->select('dmc.quantidade', 'dmc.medida')
                ->where('c.id', '=', $recomendacao->cultura_id)
                ->where('dmc.cultivo', '=', $recomendacao->cultivo)
                ->where('m.nome', '=', 'FÓSFORO')
                ->where('dmc.teor_macronutriente', '=', $disponibilidade_fosforo->classe_disponibilidade)
                ->first();
                        
            $demanda_potassio = DemandaMacronutrienteCultura::from('demanda_macronutriente_cultura as dmc')
                ->join('culturas as c', 'dmc.cultura_id', '=', 'c.id')
                ->join('macronutrientes as m', 'm.id', '=', 'dmc.macronutriente_id')
                ->select('dmc.quantidade', 'dmc.medida')
                ->where('c.id', '=', $recomendacao->cultura_id)
                ->where('dmc.cultivo', '=', $recomendacao->cultivo)
                ->where('m.nome', '=', 'POTÁSSIO')
                ->where('dmc.teor_macronutriente', '=', $disponibilidade_potassio->classe_disponibilidade)
                ->first();

            $demanda_nitrogenio = DemandaNitrogenioCultura::from('demanda_nitrogenio_cultura as dnc')
                ->join('culturas as c', 'dnc.cultura_id', '=', 'c.id')
                ->select('dnc.teor_materia_org_minimo', 'dnc.teor_materia_org_maximo', 'dnc.cultura_anterior', 'dnc.quantidade', 'dnc.medida', 'c.cultura')
                ->where('c.id', '=', $recomendacao->cultura_id)
                ->where('dnc.teor_materia_org_maximo', '>=', $mat_org)
                ->where('dnc.teor_materia_org_minimo', '<=', $mat_org)
                ->where('dnc.cultura_anterior', '=', $cultura_anterior)
                ->first();
                        
            $acrescimo_rendimento = AcrescimoRendimentoCulturas::from('acrescimo_rendimento_culturas as arc')
                ->join('culturas as c', 'arc.cultura_id', '=', 'c.id')
                ->join('macronutrientes as m', 'arc.macronutriente_id', '=', 'm.id')
                ->select('m.nome as macronutriente', 'arc.t_ha_acrescimo_rendimento', 'arc.kg_acrescimo_ha', 'arc.cultura_anterior', 'c.cultura')
                ->where('c.id', '=', $recomendacao->cultura_id)
                ->get();
                        
            $total_fosforo = 0.0;
            $total_potassio = 0.0;
            $total_nitrogenio = 0.0;

            // Percorre a tabela de acréscimo validando se precisa ser adicionado kg/ha do macronutriente por cultura
            foreach ($acrescimo_rendimento as $r) {
                switch ($r->macronutriente) {
                    case 'Fósforo':
                        if ($recomendacao->expectativa_rendimento > $r->t_ha_acrescimo_rendimento) {
                            $diferenca_rendimento = $recomendacao->expectativa_rendimento - $r->t_ha_acrescimo_rendimento;
                            $total_fosforo = $demanda_fosforo->quantidade + ($r->kg_acrescimo_ha * $diferenca_rendimento);
                        } else { 
                            $total_fosforo = $demanda_fosforo->quantidade;
                        }
                        break;
                    case 'Potássio':
                        if ($recomendacao->expectativa_rendimento > $r->t_ha_acrescimo_rendimento) {
                            $diferenca_rendimento = $recomendacao->expectativa_rendimento - $r->t_ha_acrescimo_rendimento;
                            $total_potassio = $demanda_potassio->quantidade + ($r->kg_acrescimo_ha * $diferenca_rendimento);
                        } else {
                            $total_potassio = $demanda_potassio->quantidade;
                        }
                        break;
                    case 'Nitrogênio':
                        if ($r->cultura != 'Soja')
                            if ($recomendacao->expectativa_rendimento > $r->t_ha_acrescimo_rendimento) {
                                if ($r->cultura == 'Trigo' && $r->cultura_anterior != $cultura_anterior) {
                                    break;
                                }
                                $diferenca_rendimento = $recomendacao->expectativa_rendimento - $r->t_ha_acrescimo_rendimento;
                                $total_nitrogenio = $demanda_nitrogenio->quantidade + ($r->kg_acrescimo_ha * $diferenca_rendimento);
                                break;
                            } else {
                                $total_nitrogenio = $demanda_nitrogenio->quantidade;
                            }
                            break;
                }
            }
            
            return [
                'N' => [
                    'valor' => $total_nitrogenio,
                    'medida' => isset($demanda_nitrogenio->medida) ? $demanda_nitrogenio->medida : 'kg de N/ha',
                ], 
                'P' => [
                    'valor' => $total_fosforo,
                    'medida' => $demanda_fosforo->medida,
                ],
                'K' => [
                    'valor' => $total_potassio,
                    'medida' => $demanda_potassio->medida,
                ]
            ];
        } catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function calcularNecessidadeCalagem($idAnalise)
    {
        try {

            $analise = AnalisesSolo::where('id', $idAnalise)->first();

            if ($analise->ph > 6) {
                return 0;
            }

            $saturacao_bases = $analise->saturacao_bases;

            if (is_null($analise->prnt)) {
                $analise->prnt = 100;
            }

            if ($analise->prnt != 100) {
                $fator_conversao = 100/$analise->prtn;
                $necessidade_calagem = ((80 - $analise->saturacao_bases)/100) * $analise->ctc_solo * $fator_conversao;
            } else
                $necessidade_calagem = $analise->ctc_solo * (80 - $analise->saturacao_bases) / $analise->prnt;

            // Recomendações agronômicas baseiam-se em pesquisas e experiências que mostram que aplicações inferiores a 500 kg/ha para correção de calagem são ineficazes
            if ($necessidade_calagem < 0.5)
                $necessidade_calagem = 0;

            return $necessidade_calagem;
    
        } catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }

    }

    public function calcularAdubosMateriaPrima($data, $recomendacao_id)
    {
        try {
            $nitrogenio = $data->adubo_nitrogenio != '-' ? $data->adubo_nitrogenio : 0;
            $fosforo = $data->adubo_fosforo;
            $potassio = $data->adubo_potassio;

            $porcentagem_nitrogenio = AdubosMateriaPrima::select('porcentagem')->where('id', $nitrogenio)->first();
            $porcentagem_fosforo = AdubosMateriaPrima::select('porcentagem')->where('id', $fosforo)->first();
            $porcentagem_potassio = AdubosMateriaPrima::select('porcentagem')->where('id', $potassio)->first();
            
            $porcentagem_nitrogenio = is_null($porcentagem_nitrogenio) ? 0 : $porcentagem_nitrogenio->porcentagem;
            $porcentagem_fosforo = is_null($porcentagem_fosforo) ? 0 : $porcentagem_fosforo->porcentagem;
            $porcentagem_potassio = is_null($porcentagem_potassio) ? 0 : $porcentagem_potassio->porcentagem;
            
            $recomendacao_npk = RecomendacaoNpk::where('recomendacao_id', $recomendacao_id)->first();

            return [
                'N' => $porcentagem_nitrogenio != 0 ? round($recomendacao_npk->necessidade_nitrogenio * 100 / $porcentagem_nitrogenio, 2) : null,
                'P' => $porcentagem_fosforo != 0 ? round($recomendacao_npk->necessidade_fosforo * 100 / $porcentagem_fosforo, 2) : null,
                'K' => $porcentagem_potassio != 0 ? round($recomendacao_npk->necessidade_potassio * 100 / $porcentagem_potassio, 2) : null,
            ];

        } catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function exportarPdf(Request $request, $idRecomendacao) {
        $data = Recomendacao::from('recomendacao as r')
            ->select('r.id', 'r.created_at', 'r.expectativa_rendimento', 'r.analise_id', 'r.sistema_cultivo', 'r.cultivo', 'r.cultura_anterior', 'r.prnt', 'npk.necessidade_nitrogenio as n', 'npk.necessidade_potassio as k', 
            'npk.necessidade_fosforo as p', 'amp_p.nome as adubo_fosforo', 'amp_n.nome as adubo_nitrogenio', 'amp_k.nome as adubo_potassio', 'c.cultura',
            'adub.nitrogenio as qtd_nitrogenio_adub', 'adub.potassio as qtd_potassio_adub', 'adub.fosforo as qtd_fosforo_adub', 'calagem.necessidade_calagem')
            ->join('culturas as c', 'c.id', '=', 'r.cultura_id')
            ->leftJoin('recomendacao_npk as npk', 'npk.recomendacao_id', '=', 'r.id')
            ->leftJoin('recomendacao_adubacao as adub', 'adub.recomendacao_id', '=', 'r.id')
            ->leftJoin('recomendacao_calagem as calagem', 'calagem.recomendacao_id', '=', 'r.id')
            ->leftJoin('adubos_materia_prima as amp_n', 'amp_n.id', '=', 'adub.adubo_nitrogenio_id')
            ->leftJoin('adubos_materia_prima as amp_p', 'amp_p.id', '=', 'adub.adubo_fosforo_id')
            ->leftJoin('adubos_materia_prima as amp_k', 'amp_k.id', '=', 'adub.adubo_potassio_id')
            ->where('r.id', '=', $idRecomendacao)
            ->first();

        $pdf = Pdf::loadView('recommendations.recomendacao-pdf', compact('data'));

        return $pdf->download('propriedades.pdf');
    }
}
