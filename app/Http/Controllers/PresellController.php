<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresellController extends Controller
{
    public function index(Request $request){
        
        if($request->has("utmcampaign")){

            session(["utmcampaign" => $request->query("utmcampaign")]);
        }
        
        return view("presell.index");
    }
    public function loss(){
        return view("presell.loss");
    }
}
