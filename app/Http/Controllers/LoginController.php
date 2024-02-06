<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        
        $email = $request->input('email');
        $senha = $request->input('senha');

        
        $user = DB::table('appconfig')
            ->where('email', $email)
            ->where('senha', $senha)
            ->first();
        
        $errorMessage = 'Credenciais Inválidas!';
        $successMessage = 'Login confirmado! Seja bem vindo!';
        
        if ($user) {
            // Credenciais corretas, armazene o email na sessão para uso posterior
            session_start();
            session(['email' => $email]);
            
            return view('login.index', compact('successMessage')); // Redirecione para a página do painel
            
        } else {

            return view('login.index', compact('errorMessage'));
        }
        
        
    }
}