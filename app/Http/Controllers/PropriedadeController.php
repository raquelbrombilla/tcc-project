<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Propriedades;

use Illuminate\Support\Facades\DB;
use DataTables;


class PropriedadeController extends Controller
{
    public function index(Request $request)
    {  
        try {              
            if ($request->ajax()) {
                
                $data = Propriedades::where('user_id', Auth::user()->id)->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                            <a href="propriedades/'.$row->id.'/edit" class="edit btn btn-primary" title="Editar propriedade">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button id="btnExcluirPropriedade" value="'.$row->id.'" class="edit btn btn-primary" title="Excluir propriedade">
                                <i class="bi bi-trash"></i>
                            </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('propriedades.index');
        } catch(\Exception $e){
            return [];
        }
    }

    public function edit(string $id)
    {
        try {
            $edit = Propriedades::where('user_id', Auth::user()->id)->findOrFail($id);
            return view('propriedades.cadastro', compact('edit'));    
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
            ]);

            return redirect()->route('analysis.index')->with('success', 'Análise de Solo atualizada com sucesso!');
        }
        catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
