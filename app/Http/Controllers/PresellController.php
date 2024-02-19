<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresellController extends Controller
{
    public function index(Request $request){
        
        if($request->has("utmcampaign")){

            session(["utmcampaign" => $request->query("utmcampaign")]);
        }

        $multiplicador = DB::table('app')
        ->value('multiplicador');

        return view("presell.index", compact("multiplicador"));
    }
    public function loss(){
        return view("presell.loss");
    }
}
