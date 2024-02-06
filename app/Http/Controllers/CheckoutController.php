<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{   
    protected function getCredentials(){
        $result = DB::table('gateway')
        ->first();
        
        return [
            'client_id' => $result->client_id,
            'client_secret' => $result->client_secret,
            ];
    }
    public function taxapix(){
        
        $credentials = $this->getCredentials();
        
        
        return view("checkout.taxapix", compact('credentials'));
    }

    public function taxa(){
        
        $credentials = $this->getCredentials();
        
        return view("checkout.taxa", compact('credentials'));
    }

    public function subwayvip(){
         $credentials = $this->getCredentials();
       
        return view("checkout.subwayvip", compact('credentials'));
    }
}
