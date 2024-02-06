<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function clearSession(){
        
        Session::flush();
        return redirect('/');

    }
}
