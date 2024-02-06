<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaqueController extends Controller
{
    public function index(Request $request){

        if(session()->has('email')){
            $email = session()->get('email');

            $consulta_saldo = DB::table('appconfig')
            ->select('saldo', 'depositou')
            ->where('email', $email)
            -> first();

        

            if($consulta_saldo){
                $saldo = $consulta_saldo->saldo;
            } else {
                $saldo = 0;
            }

            if($consulta_saldo){
                $depositou = $consulta_saldo->depositou;
            }

            $resultadoSaque = DB::table('saques')
            ->select('status')
            ->where('email', $email)
            ->where('status', '=', 'Aguardando Aprovação')
            ->first();

        if($resultadoSaque){ 
           
            $SaqueStatus = trim("fila");
        } else { 
            $SaqueStatus = trim("");
        }

        }
        $valor = $request->input('withdrawValue');
        return view("saque.index", ['saldo' => $saldo, 'SaqueStatus' => $SaqueStatus, 'depositou' => $depositou, 'withdrawValue' => $valor]);
    }

    public function saque(Request $request){

        if(session()->has('email') && $request->isMethod('POST')){

            $email = session()->get('email');
            $externalReference = session()->has('externalReference') ? session()->get('externalReference'): uniqid();
            $CPF = $request->input('withdrawCPF');
            $valor = $request->input('withdrawValue');
            $status = 'Aguardando Aprovação';

           
            $resultadoSaldo = DB::table('appconfig')
            ->select('saldo')
            ->where('email', $email)
            ->first();

            if($resultadoSaldo){
                $saldoDisponivel = $resultadoSaldo->saldo;

                $dadosParaInsercao = [
                    'email' => $email,
                    'externalreference'=> $externalReference,
                    'cpf'=> $CPF,
                    'valor'=> $valor,
                    'status'=> $status
                ];

                if($saldoDisponivel >= $valor){
                    $resultado = DB::table('saques')
                    ->insert($dadosParaInsercao);
                    if($resultado){
                        response()->json(['mensagem' => 'Requisição bem sucedida'], 200);
                    } else {
                        response()->json(['mensagem' => 'Requisição mal sucedida'], 404);
                    }
                    
                } else {
                    echo "<script>alert('Saldo insuficiente.');</script>";
                }
            } else {
                echo "Nenhum saldo encontrado para o usuário.";
            }
        }
    }
}
