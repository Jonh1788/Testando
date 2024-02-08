<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JogarController extends Controller
{
    public function index(Request $request){

        if($request->has('_token')){

            $email = session('email');

            $saldo = DB::table('appconfig')
            ->where('email',$email)
            ->value('saldo');
    
            $multiplicador = DB::table('app')
            ->value('multiplicador');
            
            $token = $request->_token ?  $request->_token : 0;
            $aposta = $request->bet ? $request->bet : 0; 
            $jogo = "../scripts/all.js";
            $email = $email || 0;

            return view("jogar.index", compact('aposta', 'token', 'saldo', 'multiplicador', 'jogo', 'email'));
        }

        $email = session('email');
        $saldo = 10;
        $email = $email || 0;
        $multiplicador = DB::table('app')
            ->value('multiplicador');

        $token = $request->_token ?  $request->_token : 0;
        $aposta = $request->bet ? $request->bet : 0; 
        $jogo = "../scripts/allDemo.js";

        return view("jogar.index", compact('aposta', 'token', 'saldo', 'multiplicador', 'jogo', 'email'));
        
    }
}
