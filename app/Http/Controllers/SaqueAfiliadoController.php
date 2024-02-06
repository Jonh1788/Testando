<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SaqueAfiliadoController extends Controller
{
    public function index(Request $request){

        if(!session()->has("email")){
            return redirect("/");
        }

        $mensagem_saque_ok = "";
        $mensagem_saque_erro = "";

        if(session()->has("email")){
            $email = session()->get("email");
            $consulta_saldo = DB::table('appconfig')
            ->select('saldo_comissao')
            ->where('email', $email)
            ->first();

            $consulta_status = DB::table('saque_afiliado')
            ->select('status')
            ->where('email', $email)
            ->first();

            if($consulta_saldo) {
                $saldo = $consulta_saldo->saldo_comissao;

                $nome_destinatario = $request->input('withdrawName');
                $pix = $request->input('withdrawCPF');
                $valor_disponivel = $saldo;

                if($request->isMethod('POST')){

                    $valor_saque = floatval($valor_disponivel);
                    $status = trim($consulta_status->status);

                    if($status == 'Aguardando Aprovação'){
                        echo "<script>alert('Existe saque solicitado na fila. Por favor, aguarde');</script>";
                    } else {
                        
                        if($valor_saque > 0 && $valor_saque <= $saldo) {

                            $status = 'Aguardando Aprovação';

                    }
                }
            }

        }
        
        return view('saque-afiliado.index', compact('email','saldo', 'mensagem_saque_erro', 'mensagem_saque_ok'));

    }
}
}
