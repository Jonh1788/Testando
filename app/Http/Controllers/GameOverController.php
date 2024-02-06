<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GameOverController extends Controller
{   
    protected function atualizarPercas($email){
        try {

            $results = DB::table('confirmar_deposito')
            ->where('email', $email)
            ->where('status', 'pendente')
            ->get();

            foreach($results as $result){

                $resultPix = DB::table('pix_deposito')
                ->where('code', $result->externalreference)
                ->first();

                

                if($resultPix !== null){


                    DB::table('confirmar_deposito')
                    ->where('externalreference', $result->externalreference)
                    ->update(['status' => 'aprovado']);

                    $valorCorrespondencia = $resultPix->value;

                    DB::table('appconfig')
                    ->where('email', $email)
                    ->update([
                        'saldo' => DB::raw("saldo + $valorCorrespondencia"),
                        'depositou' => DB::raw("depositou + $valorCorrespondencia")
                    ]);

                    return redirect()->to('/obrigado');
                }

            }

            
        } catch(\Exception $e) {
            echo "Erro: " .$e->getMessage();
        }
    }

    protected function pegarSaldo($email){

        $resultadoSaldo = DB::table("appconfig")
        ->select('saldo')
        ->where('email', $email)
        ->first();

        if($resultadoSaldo !== null){
           return $resultadoSaldo->saldo;
        } else {
            return 0;
        }
    }

    protected function atualizarSaldo($email, $valor){

        $saldoResult = DB::table('appconfig')->SELECT('saldo')->where('email',$email)->first();
        $saldoAtual = $saldoResult->saldo;

        $novoSaldo = $saldoAtual + $valor;

        DB::table('appconfig')
        ->where('email',$email)
        ->update(['saldo' => $novoSaldo]);
    }

    public function win(Request $request){
        
        if(!session()->has("email")){
            return redirect("/");
        }
        

        // $tokenFromUrl = $request->query('token','');
        // $tokenFromCookie = null;
        // if(isset( $_COOKIE['token'])){
            
        //     $tokenFromCookie =  $_COOKIE['token'];
        // }
        
        // if($tokenFromUrl !== $tokenFromCookie){
            
        //     return redirect('/painel');
        // }
        
        
        $email = session()->has("email") ? session("email") : "";
        
        $saldo = $this->pegarSaldo($email);
        
        if($request->valor){
            $valor = $request->valor;

            if($valor === 0 || $valor === null || $valor === ""){
                $valor = 0.00;
            }

            if($email){

                $this->atualizarSaldo($email, $valor);
                $this->atualizarPercas($email);

                
            } else {

                echo "Erro ao obter o saldo";
            }

        } 
        // setcookie('token', '', time() + 1, '/');
        return view("gameover.win", ['saldo' => $saldo, 'valor' => $valor]);
    }

    public function loss(Request $request){

        if(!session()->has("email")){
            return redirect("/");
        }
        
        $email = session()->has("email") ? session()->get("email") : "";
        $saldo = $this->pegarSaldo($email);
        
        $valor = $request->aposta;

        if ($request->aposta) {

            if ($valor === 0 || $valor === null || $valor === '') {
                $valor = 0.00;
            }

            if ($email) {

                $this->atualizarSaldo($email, $valor * -1);

                $percasResult = DB::table('appconfig')
                ->select('percas')
                ->where('email', $email)
                ->first();

                if($percasResult){

                    $percasAtual = $percasResult->percas;

                    $percas = floatval($percasAtual) + floatval($valor);

                    DB::table('appconfig')
                    ->where('email', $email)
                    ->update(['percas' => $percas]);
                }

                $this->atualizarPercas($email);
            }
        }

        return view('gameover.loss', ['valor' => $valor]);
    }
}
