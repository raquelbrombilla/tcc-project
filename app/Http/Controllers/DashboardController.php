<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AnalisesSolo;
use App\Models\Recomendacao;
use App\Models\Propriedades;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {  
        try {   
            $propriedades = Propriedades::where('user_id', '=', Auth::user()->id)->get();

            return view('dashboard', compact('propriedades'));
        } catch(\Exception $e){
            return [];
        }
    }

    public function info(Request $request) 
    {
        $propriedade_id = intval($request->input('propriedade'));
        $pontos = AnalisesSolo::select('latitude', 'longitude')
            ->where('user_id', '=', Auth::user()->id)
            ->where('propriedade_id', '=', $propriedade_id)
            ->get();

        $pnts = [];
        $i = 0;
        foreach ($pontos as $ponto) {
            $pnts[$i]['lat'] = floatval($ponto->latitude);
            $pnts[$i]['lon'] = floatval($ponto->longitude);
            $i++;
        } 

        $analises = AnalisesSolo::from('analises_solo as a')
            ->join('recomendacao as r', 'r.analise_id', '=', 'a.id')
            ->join('culturas as c', 'c.id', '=', 'r.cultura_id')
            ->select(DB::raw('COUNT(c.cultura) AS cont, c.cultura AS cultura'))
            ->where('a.propriedade_id', '=', $propriedade_id)
            ->groupBy('c.id')
            ->get();

        return response()->json(['pontos' => $pnts, 'analises' => $analises]);
    }
}
