<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AfiliateController extends Controller
{
    public function index(){
        if (session()->has('email')) {
            $email = session('email');

            // Obter valores do banco de dados usando o Eloquent ORM ou o Query Builder

            $plano = DB::table('app')->value('revenue_share_falso');
            $cpa = DB::table('app')->value('cpa');
            $cpa_u = DB::table('appconfig')->where('email', $email)->value('cpa');
            $cont_cpa = DB::table('appconfig')->where('email', $email)->value('cont_cpa');
            $saldo_comissao = DB::table('appconfig')->where('email', $email)->value('saldo_comissao');

            // ... outras consultas ...

            $linkAfiliado = DB::table('appconfig')->where('email', $email)->value('linkafiliado');

            $cads = DB::table('appconfig')->where('afiliado', function ($query) use ($email) {
                $query->select('id')->from('appconfig')->where('email', $email)->limit(1);
            })->count();

            $cad_ativo = DB::table('appconfig')->where('afiliado', function ($query) use ($email) {
                $query->select('id')->from('appconfig')->where('email', $email)->limit(1);
            })->where('status_primeiro_deposito', 1)->count();

            $saldo_cpa = DB::table('appconfig')->where('email', $email)->value('saldo_cpa');

            $rev_ativo_sum = DB::table('app')
                ->select(DB::raw('IFNULL(revenue_share * (SELECT sum(depositou) FROM appconfig WHERE afiliado = (SELECT id from appconfig WHERE email = ? LIMIT 1) AND status_primeiro_deposito = 1) / 100, 0)'))
                ->addBinding([$email], 'select')
                ->value('column');

            $saldo_comissao = floatval($saldo_cpa) + floatval($rev_ativo_sum);

            // Atualizar o valor na tabela appconfig apenas para a linha com o email da sessão
            DB::table('appconfig')
                ->where('email', $email)
                ->update(['saldo_comissao' => $saldo_comissao]);

            // Consultar o valor da coluna indicados para o email atual
            $indicados = DB::table('appconfig')->where('email', $email)->value('indicados');

            // Restante do código...

            return view('afiliate.index', compact('plano', 'cpa', 'cpa_u', 'cont_cpa', 'saldo_comissao', 'linkAfiliado', 'cads', 'cad_ativo', 'indicados', 'saldo_cpa','rev_ativo_sum'));
        } else {
            // Redirecionar para a página de login se o email não estiver na sessão
            return redirect('/login');
        }
        
    }
}
