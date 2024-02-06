<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JogoDemoController extends Controller
{
   public function index(){
    return view("jogodemo.index");
   }
   
   public function lossdemo(Request $request){ 
       
        $email = 'influencer@mail.com';
        $saldo = 1;
    if ($request->has('msg')) {
        $valor = $request->query('msg');
    
        if ($valor === 0 || $valor === null || $valor === '') {
            $valor = 0.00;
            }
        }
    
        return view("jogodemo.loss", compact('valor'));
   }
   
    public function windemo(Request $request){
        
           $email = 'influencer@mail.com';
        $saldo = 1;
    if ($request->has('msg')) {
        $valor = $request->query('msg');
    
        if ($valor === 0 || $valor === null || $valor === '') {
            $valor = 0.00;
        }
    }
        return view("jogodemo.win", compact('valor'));
   }

   public function indexPresell(){
    return view("jogodemopresell.index");
   }
}
