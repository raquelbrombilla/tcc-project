<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use DataTables;


class UserController extends Controller
{
    public function index(Request $request)
    {  
        try {              
            if ($request->ajax()) {
                
                $data = User::all();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "";
                        if ($row->active) {
                            $btn .= "
                                <form action=\"".route('users.toggleActive', $row->id)."\" method='POST' style='display:inline;'>
                                    ".csrf_field()."
                                    ".method_field('PUT')."
                                    <button type='submit' class='btn-inativar btn btn-primary' title='Inativar usuário'>
                                        <i class='bi bi-toggle-off'></i>
                                    </button>
                                </form>
                            ";
                        } else {
                            $btn .= "
                                <form action=\"".route('users.toggleActive', $row->id)."\" method='POST' style='display:inline;'>
                                    ".csrf_field()."
                                    ".method_field('PUT')."
                                    <button type='submit' class='btn-ativar btn btn-primary' title='Ativar usuário'>
                                        <i class='bi bi-toggle-on'></i>
                                    </button>
                                </form>
                            ";
                        }

                        if ($row->admin) {
                            $btn .= "
                                <form action=\"".route('users.toggleAdmin', $row->id)."\" method='POST' style='display:inline;'>
                                    ".csrf_field()."
                                    ".method_field('PUT')."
                                    <button type='submit' class='btn-revogar-admin btn btn-primary' title='Revogar acesso administrador'>
                                        <i class='bi bi-person-badge'></i>
                                    </button>
                                </form>
                            ";
                        } else {
                            $btn .= "
                                <form action=\"".route('users.toggleAdmin', $row->id)."\" method='POST' style='display:inline;'>
                                    ".csrf_field()."
                                    ".method_field('PUT')."
                                    <button type='submit' class='btn-tornar-admin btn btn-primary' title='Tornar administrador'>
                                        <i class='bi bi-person-badge-fill'></i>
                                    </button>
                                </form>
                            ";
                        }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            }

            return view('users.index');
        } catch(\Exception $e){
            return [];
        }
    }

    public function toggleActive(Request $request, $id)
    {
        try {
            $user = User::find($id);

            User::where('id', $id)->update([
                'active' => !$user->active,
            ]);

            return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
        }
        catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function toggleAdmin(Request $request, $id)
    {
        try {
            $user = User::find($id);

            User::where('id', $id)->update([
                'admin' => !$user->admin,
            ]);

            return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');        }
        catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }
}
