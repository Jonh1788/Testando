<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronjobsController extends Controller
{
    public function otimizarbanco(){
        
        try {
            date_default_timezone_set('America/Sao_Paulo');
            
            $agora = new \DateTime();
            $agora->sub(new \DateInterval('PT30M')); // Subtrai 30 minutos
            
            $duasHorasAtras = $agora->format('Y-m-d H:i:s');
            
        
            DB::table('appconfig')
            ->where('saldo', 0)
            ->where('saldo_cpa', '')
            ->where('data_cadastro', "<=", $duasHorasAtras)
            ->delete();
        
            echo "Registros deletados com sucesso.";
        
        } catch (\Exception $e) {
            
            echo "Erro de banco de dados: " . $e->getMessage();
        } finally {

        }       
    }

    public function atualizar_afiliados(){

        $batchSize = 1000;
    $start = 0;

    do {
        
        $idsToUpdate = DB::table('appconfig')
            ->select('id')
            ->skip($start)
            ->take($batchSize)
            ->pluck('id');

        if ($idsToUpdate->count() > 0) {
        
            DB::table('appconfig')
                ->whereIn('id', $idsToUpdate)
                ->update([
                    'indicados' => DB::raw("(SELECT COUNT(*) FROM appconfig AS ac WHERE FIND_IN_SET(appconfig.id, ac.lead_aff) > 0)"),
                ]);

            echo "Atualização de $batchSize registros concluída com sucesso.<br>";
            $start += $batchSize;
        } else {
            
            break;
        }
    } while (true);
    }

    public function calcular_comissoes(){

        $indicados = DB::table('appconfig')
        ->select('id','indicados')
        ->where('indicados','>', 0)
        ->get();

        $stylePrincipal = "color: blue; font-weight: bold;";
        $styleAfiliado = "color: green; margin-left: 20px;";

        foreach($indicados as $indicado){

            $id = $indicado->id;
            $indicadosCount = $indicado->indicados;

            echo "<div style='$stylePrincipal'>ID Principal: $id, Indicados: $indicadosCount</div>";

            $somaTotalDepositouPrincipal = 0;
            $somaTotalPercasPrincipal = 0;
            $idsAfiliados = array();

            $contasVinculadas = DB::table('appconfig')
            ->select('id', 'depositou', 'percas')
            ->where('lead_aff', $id)
            ->get();
            
            foreach($contasVinculadas as $contaVinculada){

                $idVinculado = $contaVinculada->id;
                $depositou = $contaVinculada->depositou;
                $percas = $contaVinculada->percas;

                echo "<div style='$styleAfiliado'>ID Afiliado: $idVinculado, Depositou: $depositou, Percas: $percas</div>";

                $idsAfiliados[] = $idVinculado;

                if(!empty($depositou)){
                    $somaTotalDepositouPrincipal += $depositou;
                }

                if(!empty($percas)){
                    $somaTotalPercasPrincipal += $percas;
                }

            }

            echo "<div style='$stylePrincipal'>Soma Total de Depositou do ID Principal: $somaTotalDepositouPrincipal</div>";
            echo "<div style='$stylePrincipal'>Soma Total de Percas do ID Principal: $somaTotalPercasPrincipal</div>";

            $comissaoPrincipal = $somaTotalPercasPrincipal * 0.20;
            
            DB::table('appconfig')
            ->where('id', $id)
            ->update([
                'saldo_comissao' => $comissaoPrincipal,
            ]);
        
            echo "<div style='$stylePrincipal'>Comissão do ID Principal: $comissaoPrincipal</div>";

            if(!empty($idsAfiliados)){
                echo "<div style='$styleAfiliado'>IDs Afiliados: " . implode(", ", $idsAfiliados) . "</div>";
            }

            echo "<br>";
            

        }
    }

    public function calcular_cpa(){

        $indicados = DB::table('appconfig')->select('id', 'indicados')->where('indicados', '>', 0)->get();

        $stylePrincipal = "color: blue; font-weight: bold;";
        $styleAfiliado = "color: green; margin-left: 20px;";
        $styleIdsAfiliado = "color: red; margin-left: 20px;";

        foreach ($indicados as $indicado) {
            $idPrincipal = $indicado->id;
            $indicadosCount = $indicado->indicados;

            echo "<div style='$stylePrincipal'>ID Principal: $idPrincipal, Indicados: $indicadosCount</div>";

            $somaTotalDepositouPrincipal = 0;
            $quantidadeCPA = 0;
            $idsAfiliados = [];

            $contasVinculadas = DB::table('appconfig')->select('id', 'primeiro_deposito', 'cont_cpa')
                ->where('lead_aff', $idPrincipal)
                ->get();

            foreach ($contasVinculadas as $contaVinculada) {
                $idVinculado = $contaVinculada->id;
                $primeiroDeposito = $contaVinculada->primeiro_deposito;
                $qtdCPA = $contaVinculada->cont_cpa;

                if ($primeiroDeposito !== null && $primeiroDeposito !== '') {
                    echo "<div style='$styleAfiliado'>ID Afiliado: $idVinculado, Primeiro Depósito: $primeiroDeposito</div>";

                    $idsAfiliados[] = $idVinculado;

                    $somaTotalDepositouPrincipal += $primeiroDeposito;

                    if ($primeiroDeposito > 0) {
                        $quantidadeCPA = $quantidadeCPA + 1;
                    }
                }
            }

            DB::table('appconfig')->where('id', $idPrincipal)->update(['saldo_cpa' => $somaTotalDepositouPrincipal, 'cont_cpa' => $quantidadeCPA]);

            echo "<div style='$styleAfiliado'>Soma Total de CPA do ID Principal: $somaTotalDepositouPrincipal</div>";
            echo "<div style='$styleAfiliado'>Quantidade de CPA's: $quantidadeCPA</div>";

            if (!empty($idsAfiliados)) {
                echo "<div style='$styleIdsAfiliado'>IDs Afiliados: " . implode(", ", $idsAfiliados) . "</div>";
            }

            echo "<br>";
        }
    }

    public function calcular_depositos(){
        
        $resultados =  DB::table('confirmar_deposito')
        ->select('email', DB::raw('SUM(valor) as total_depositado'))
            ->where('status', 'aprovado')
            ->groupBy('email')
            ->get();

        if ($resultados->count() > 0) {
            foreach ($resultados as $resultado) {
                $email = $resultado->email;
                $totalDepositado = $resultado->total_depositado;

                
                DB::table('appconfig')
                ->where('email', $email)
                    ->update(['depositou' => $totalDepositado]);
            }

            echo "Atualização concluída com sucesso.";
        } else {
            echo "Nenhum resultado encontrado.";
        }
    }

    public function calcular_saldo_novo(){

         
         $saldoInserido = DB::table('ggr')->value('saldo_inserido');

         if ($saldoInserido > 0) {
             
             $debitoGgr = DB::table('ggr')->value('debito_ggr');
 
             
             $resultado = $saldoInserido - $debitoGgr;
 
             
             DB::table('ggr')->update(['credito_ggr' => $resultado, 'debito_ggr' => 0, 'saldo_inserido' => 0]);
 
             
             DB::table('ggr')->increment('ggr_pago', $debitoGgr);
 
             echo "Resultado adicionado à coluna credito_ggr, colunas debito_ggr e saldo_inserido definidas como 0, e valor de debito_ggr somado à coluna ggr_pago com sucesso!";
         } else {
             echo "Nenhum valor para subtrair (saldo_inserido <= 0)";
         }
    }

    public function calculo_ggr_total(){
        try {
            DB::beginTransaction();

            $totalPercas = DB::table('appconfig')->sum('percas');

            $countGgr = DB::table('ggr')->count();

            if ($countGgr > 0) {

                DB::table('ggr')->update(['total_percas' => $totalPercas]);

            } else {
                
                DB::table('ggr')->insert(['total_percas' => $totalPercas]);
            }

            
            $ggrTaxa = DB::table('ggr')->value('ggr_taxa');

            
            $totalPercasGgr = DB::table('ggr')->value('total_percas');

            
            $porcentagemDesconto = round(((float)$ggrTaxa / 100) * (float)$totalPercasGgr, 2);

            
            DB::table('ggr')->update(['ggr_total' => $porcentagemDesconto]);

            
            $resultado = DB::table('ggr')->selectRaw('ROUND(GREATEST(ggr_total - ggr_pago, 0), 2) as resultado')->value('resultado');

            
            DB::table('ggr')->update(['debito_ggr' => $resultado]);

            
            $debitoGgr = DB::table('ggr')->value('debito_ggr');

            
            $statusGgr = ($debitoGgr == 0) ? 'REGULAR' : 'IRREGULAR';

            
            DB::table('ggr')->update(['status_ggr' => $statusGgr]);

            DB::commit();
            echo "Operação concluída com sucesso!";
        } catch (\Exception $e) {
            DB::rollBack();
            echo "Erro: " . $e->getMessage();
        }
    }

    public function creditarggr(){
        try {
            DB::beginTransaction();

            
            $debitoGgrInfo = DB::table('ggr')->select('debito_ggr', 'credito_ggr')->first();

            $debitoGgr = $debitoGgrInfo->debito_ggr;

            
            if ($debitoGgr > 0 && $debitoGgr <= $debitoGgrInfo->credito_ggr) {
                
                DB::table('ggr')->increment('ggr_pago', $debitoGgr);

                
                DB::table('ggr')->update(['debito_ggr' => 0, 'credito_ggr' => DB::raw('credito_ggr - ' . $debitoGgr)]);

                echo "Operações concluídas com sucesso!\n";
            } else {
                echo "Nenhum valor válido para somar (debito_ggr <= 0 ou maior que credito_ggr). Nenhuma operação realizada.\n";
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo "Erro: " . $e->getMessage() . "\n";
        }
    }

    public function primeiro_deposito_status_deposito(){
        
        $pixDepositos = DB::table('confirmar_deposito')->select('email', 'valor', 'status')->get();

        $stylePrincipal = "color: blue; font-weight: bold;";

        
        foreach ($pixDepositos as $pixDeposito) {
            $emailDeposito = $pixDeposito->email;
            $valueDeposito = $pixDeposito->valor;
            $statusDeposito = $pixDeposito->status;

            echo "<div style='$stylePrincipal'>email: $emailDeposito</div>";
            echo "<div style='$stylePrincipal'>valor: $valueDeposito</div>";
            echo "<div style='$stylePrincipal'>status: $statusDeposito</div>";
            echo "<br/>";

            
            if ($statusDeposito == "PAID_OUT") {
                try {
                    
                    DB::table('appconfig')
                        ->where('email', $emailDeposito)
                        ->update([
                            'status_primeiro_deposito' => 1,
                            'primeiro_deposito' => $valueDeposito,
                        ]);

                    echo "<div style='$stylePrincipal'>Atualização bem-sucedida na tabela appconfig para o email: $emailDeposito</div>";

                   
                    $appConfigCheck = DB::table('appconfig')
                        ->where('email', $emailDeposito)
                        ->first();

                    echo "<pre>";
                    print_r($appConfigCheck);
                    echo "</pre>";
                } catch (\Exception $e) {
                    echo "<div style='$stylePrincipal'>Erro na atualização da tabela appconfig para o email: $emailDeposito. Erro: " . $e->getMessage() . "</div>";
                }
            }
        }
    }

    public function index(){

       $this->atualizar_afiliados();
       $this->calcular_comissoes();
       $this->calcular_cpa();
       $this->calcular_depositos();
       $this->calcular_saldo_novo();
       $this->calculo_ggr_total();
       $this->creditarggr();
       $this->primeiro_deposito_status_deposito();
    }


}