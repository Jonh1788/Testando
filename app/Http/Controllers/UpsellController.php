<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpsellController extends Controller
{
    public function index(){
        return view("upsell.index");
    }
}
