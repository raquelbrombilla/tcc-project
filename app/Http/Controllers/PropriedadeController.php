<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Propriedades;
use App\Models\AnalisesSolo;

use App\Http\Requests\PropriedadesRequest;

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
                        $btn = "
                            <a href=\"".route('propriedades.edit', $row->id)."\" class='edit btn btn-primary' title='Editar propriedade'>
                                <i class='bi bi-pencil-square'></i>
                            </a>
                            <form class='formExcluir' action=\"". route('propriedades.destroy', $row->id) ."\" data-id=\"".$row->id."\" method='POST' style='display:inline-block;'>
                                ".csrf_field()."
                                <input type='hidden' name='_method' value='DELETE'>
                                <button type='submit' class='btn btn-danger btn-excluir'><i class='bi bi-trash'></i></button>
                            </form>";

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

    public function create()
    {
        try {
            return view('propriedades.cadastro');
        } catch(\Exception $e){
            return back();
        }
    }

    public function store(PropriedadesRequest $request)
    {
        try {
            $request->validated();

            $propriedade = Propriedades::create([
                'nome' => $request->nome,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('propriedades.index')->with('success', 'Propriedade cadastrada com sucesso!');
        } catch(\Exception $e){
            return back();
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

    public function update(PropriedadesRequest $request, $id)
    {
        try {
            $request->validated();

            Propriedades::where('id', $id)->update([
                'nome' => $request->nome,
            ]);

            return redirect()->route('propriedades.index')->with('success', 'Propriedade atualizada com sucesso!');
        }
        catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $analises = AnalisesSolo::where('propriedade_id', $id)->get();

            if (count($analises) > 0) {
                return redirect()->route('propriedades.index')->with('warning', 'Existem análises de solo vinculadas à essa propriedade. Não é possível excluí-la.');    
            }
            
            $delete = Propriedades::where('id', $id)->delete();

            return redirect()->route('propriedades.index')->with('success', 'Propriedade excluída com sucesso.');    
        }
        catch(\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
