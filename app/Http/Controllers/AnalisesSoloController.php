<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\AnalisesSoloRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Propriedades;
use App\Models\Recomendacao;
use App\Models\RecomendacaoNPK;
use App\Models\RecomendacaoAdubacao;
use App\Models\RecomendacaoCalagem;


use App\Models\AnalisesSolo;

use DataTables;


class AnalisesSoloController extends Controller
{
    /**
     * 
     */

    public function index(Request $request)
    {  
        try {
            if ($request->ajax()) {
                $data = AnalisesSolo::from('analises_solo as a')
                    ->join('propriedade as p', 'p.id', '=', 'a.propriedade_id')
                    ->leftJoin('recomendacao as r', 'r.analise_id', '=', 'a.id')
                    ->select('a.data_analise', 'a.nome_talhao', 'a.municipio', 'a.id', 'p.nome as propriedade', DB::raw('COUNT(r.id) as qtd_recomendacao'))
                    ->where('a.user_id', Auth::user()->id)
                    ->groupBy('a.id')
                    ->get();
                
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "
                            <a href=\"".route('analysis.edit', $row->id)."\" class='edit btn btn-primary' title='Editar análise'>
                                <i class='bi bi-pencil-square'></i>
                            </a>
                            <form class='formExcluir' action=\"".route('analysis.destroy', $row->id)."\" method='POST' style='display:inline-block;'>
                                ".csrf_field()."
                                <input type='hidden' name='_method' value='DELETE'>
                                <button type='submit' class='btn btn-danger btn-excluir'><i class='bi bi-trash'></i></button>
                            </form>
                            <a href=\"".route('analysis.show', $row->id)."\" class='edit btn btn-primary' title='Visualizar análise'>
                                <i class='bi bi-eye'></i>
                            </a>";

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('analysis.index');
        } catch(\Exception $e){
            return back();
        }
    }

    public function create(Request $request): View
    {
        try {
            $propriedades = Propriedades::where('user_id', '=', Auth::user()->id)->get();

            return view('analysis.cadastro', compact('propriedades'));
        } catch(\Exception $e){
            return back();
        }
    }

    public function store(AnalisesSoloRequest $request)
    {
        try {
            $request->validated();

            $analiseSolo = AnalisesSolo::create([
                'data_analise' => $request->data_analise,
                'nome_talhao' => $request->nome_talhao,
                'area_ha' => $request->area_ha,
                'estado' => $request->estado,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'argila' => $request->argila,
                'ph' => $request->ph,
                'indice_smp' => $request->indice_smp,
                'fosforo' => $request->fosforo,
                'potassio' => $request->potassio,
                'materia_organica' => $request->materia_organica,
                'aluminio' => $request->aluminio,
                'calcio' => $request->calcio,
                'hidrogenio_aluminio' => $request->hidrogenio_aluminio,
                'ctc_solo' => $request->ctc_solo,
                'enxofre' => $request->enxofre,
                'zinco' => $request->zinco,
                'cobre' => $request->cobre,
                'boro' => $request->boro,
                'manganes' => $request->manganes,
                'ferro' => $request->ferro,
                'user_id' => Auth::user()->id,
                'propriedade_id' => $request->propriedade
            ]);

            return redirect()->route('analysis.show', ['id' => $analiseSolo->id])->with('success', 'Análise de Solo cadastrada com sucesso!');
        } catch(\Exception $e){
            return back();
        }
    }


    public function show($id)
    {
        try {
            $data = AnalisesSolo::select('analises_solo.*', 'users.name', 'propriedade.nome as propriedade')
                ->join('users', 'users.id', '=', 'analises_solo.user_id')
                ->join('propriedade', 'propriedade.id', '=', 'analises_solo.propriedade_id')
                ->where('analises_solo.user_id', Auth::user()->id)
                ->where('analises_solo.id', $id)
                ->first();

            $recomendacoes = Recomendacao::from('recomendacao as r')
                ->select('r.id','r.created_at', 'r.identificador', 'c.cultura')
                ->join('analises_solo as a', 'a.id', '=', 'r.analise_id')
                ->join('culturas as c', 'c.id', '=', 'r.cultura_id')
                ->where('r.analise_id', '=', $id)
                ->get();
               
            return view('analysis.analise-info', compact('data', 'recomendacoes'));

        } catch(\Exception $e){
            return back();
        }
    }

    public function edit(string $id)
    {
        try {
            $edit = AnalisesSolo::where('user_id', Auth::user()->id)->findOrFail($id);
            $propriedades = Propriedades::where('user_id', '=', Auth::user()->id)->get();

            return view('analysis.cadastro', compact('edit', 'propriedades'));    
        } 
        catch(\Exception $e){
            return back();
        }
    }

    public function update(AnalisesSoloRequest $request, $id)
    {
        try{
            $request->validated();

            AnalisesSolo::where('id', $id)->update([
                'data_analise' => $request->data_analise,
                'nome_talhao' => $request->nome_talhao,
                'area_ha' => $request->area_ha,
                'estado' => $request->estado,
                'municipio' => $request->municipio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'argila' => $request->argila,
                'ph' => $request->ph,
                'indice_smp' => $request->indice_smp,
                'fosforo' => $request->fosforo,
                'potassio' => $request->potassio,
                'materia_organica' => $request->materia_organica,
                'aluminio' => $request->aluminio,
                'calcio' => $request->calcio,
                'hidrogenio_aluminio' => $request->hidrogenio_aluminio,
                'ctc_solo' => $request->ctc_solo,
                'enxofre' => $request->enxofre,
                'zinco' => $request->zinco,
                'cobre' => $request->cobre,
                'boro' => $request->boro,
                'manganes' => $request->manganes,
                'ferro' => $request->ferro,
                'propriedade_id' => $request->propriedade
            ]);

            return redirect()->route('analysis.index')->with('success', 'Análise de Solo atualizada com sucesso!');
        }
        catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $recomendacao = Recomendacao::where('analise_id', $id)->get();
            
            foreach ($recomendacao as $r) {
                $recomendacao_adubacao = RecomendacaoAdubacao::where('recomendacao_id', $r->id)->delete();
                $recomendacao_calagem = RecomendacaoCalagem::where('recomendacao_id', $r->id)->delete();
                $recomendacao_npk = RecomendacaoNPK::where('recomendacao_id', $r->id)->delete();
                $recomendacao = Recomendacao::where('id', $r->id)->delete();    
            }

            $analise = AnalisesSolo::where('id', $id)->delete();

            return redirect()->route('analysis.index')->with('success', 'A análise de solo e todas as suas recomendações foram excluídas com sucesso.');    
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

}
