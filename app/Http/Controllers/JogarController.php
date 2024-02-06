<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogarController extends Controller
{
    public function index(Request $request){
        

        $token = $request->_token;
        $aposta = $request->bet; 
        return view("jogar.index", compact('aposta', 'token'));
    }
}
