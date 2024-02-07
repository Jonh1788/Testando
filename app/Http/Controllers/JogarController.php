<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JogarController extends Controller
{
    public function index(Request $request){

        $email = session('email');
        $saldo = DB::table('appconfig')
        ->where('email',$email)
        ->value('saldo');

        $multiplicador = DB::table('app')
        ->value('multiplicador');
        
        $token = $request->_token;
        $aposta = $request->bet; 
        return view("jogar.index", compact('aposta', 'token', 'saldo', 'multiplicador'));
    }
}
