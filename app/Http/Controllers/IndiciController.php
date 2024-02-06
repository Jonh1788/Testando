<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndiciController extends Controller
{
    public function index(){
        if(session()->has('email')){
            return redirect('/painel');
        }
        return view("indice.index");
    }
}
