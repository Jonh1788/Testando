<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PainelController extends Controller
{   
    public function legal(){
        return view("legal.index");
    }
    public function index(Request $request)
    {   
        
        $email = session("email");
       
        

        $this->processarConfirmacoesDeposito($email);

        
        $dificuldade_jogo = $this->obterDificuldadeJogo($email);

       
        $saldo = $this->obterSaldo($email);

        
        if(!session()->has('email')){
            header("Location: /");
            exit();
        }
        
        return view('painel.index', compact('saldo', 'dificuldade_jogo'));
    }

    private function processarConfirmacoesDeposito($email)
    {
        if (!empty($email)) {
            try {
                $conn = new \PDO("mysql:host=localhost;dbname=seu_banco_de_dados", "seu_usuario", "sua_senha");
                $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                
                $stmt = $conn->prepare("SELECT * FROM confirmar_deposito WHERE email = :email AND status = 'pendente'");
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                
                while ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    
                    $stmtPix = $conn->prepare("SELECT * FROM pix_deposito WHERE code = :externalReference");
                    $stmtPix->bindParam(':externalReference', $result['externalreference']);
                    $stmtPix->execute();

                    
                    $resultPix = $stmtPix->fetch(\PDO::FETCH_ASSOC);

                    if ($resultPix !== false) {
                        
                        $updateStmt = $conn->prepare("UPDATE confirmar_deposito SET status = 'aprovado' WHERE externalreference = :externalReference");
                        $updateStmt->bindParam(':externalReference', $result['externalreference']);
                        $updateStmt->execute();

                        
                        $valorCorrespondencia = $resultPix['value'];

                        
                        $updateSaldoStmt = $conn->prepare("UPDATE appconfig SET saldo = saldo + :valorCorrespondencia, depositou = depositou + :valorCorrespondencia WHERE email = :email");
                        $updateSaldoStmt->bindParam(':valorCorrespondencia', $valorCorrespondencia);
                        $updateSaldoStmt->bindParam(':email', $email);
                        $updateSaldoStmt->execute();
                        break; 
                    }
                }

            } catch (\PDOException $e) {
                
                report($e);
            }
        }
    }

    private function obterDificuldadeJogo($email)
    {
        $dificuldade_jogo = 0;

        if (!empty($email)) {
            try {
                
                $dificuldade_jogo = DB::table('app')->value('dificuldade_jogo');
                
            } catch (\Exception $e) {
                
                report($e);
            }
        }

        return $dificuldade_jogo;
    }

    private function obterSaldo($email)
    {
        $saldo = 0;

        if (!empty($email)) {
            try {
                
                $saldo = DB::table('appconfig')->where('email', $email)->value('saldo');
            } catch (\Exception $e) {
                
                report($e);
            }
        }

        return $saldo;
    }
}