<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Ramsey\Uuid\Uuid;

class CadastrarController extends Controller
{
    public function index(Request $request){
    
        $afiliado = $request->query('aff') ? $request->query('aff')  : 0;
        session(['afiliado' => $afiliado]);
        return view('cadastrar.index');
    }

    public function store(Request $request){
        
        $baseUrl = $request->fullUrl();
        $staticPart = '?aff=';
        $callbackUrl = $baseUrl . $staticPart;
        
        $conn = DB::connection()->getPdo();
        
        $email = $request->input('email');
        $senha = $request->input('senha');
        $leadAff = request()->input('lead_aff', '0');
        $utmcampaign = session()->has('utmcampaign') ? session('utmcampaign') : '' ;

        if($leadAff == null){
            $leadAff = 0;
        }

        if ($this->emailExists($email, $conn)) {
            
            return redirect()->back()->with('error', 'Email já existe!');
        }

        $nextId = (string) Uuid::uuid4();

        $saldo = 0;
        $plano = 20;
        $saldo_comissao = 0;
        $cpa = 0;

        $linkAfiliado = $callbackUrl . substr($nextId, 0, 5);

        $dataCadastro = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $dataCadastroFormatada = $dataCadastro->format('Y-m-d H:i');

        $afiliado = session('afiliado');
        // Inserir dados no banco de dados usando Eloquent ou Query Builder
        DB::table('appconfig')->insert([
            'id' => $nextId,
            'nome' => '',
            'cpa' => 0,
            'email' => $email,
            'senha' => $senha,
            'cpf' => '',
            'telefone' => '00000',
            'saldo' => $saldo,
            'lead_aff' => $leadAff,
            'linkafiliado' => $linkAfiliado,
            'indicados' => 0,
            'plano' => $plano,
            'saldo_comissao' => $saldo_comissao,
            'data_cadastro' => $dataCadastroFormatada,
            'afiliado' => $afiliado,
            'jogoteste' => '',
            'depositou' => 0,
            'leads_ativos' => '',
            'rollover1' => '', 
            'demo' => '',
            'bloc' => '',
            'sacou' => '',
            'percas' => '',
            'ganhos' => '',
            'cpafake' => '',
            'jogo_demo' => '',
            'comissaofake' => '',
            'saldo_cpa' => '',
            'primeiro_deposito' => '',
            'status_primeiro_deposito' => '',
            'cont_cpa' => '',
            'utm_source' => '',
            'utm_medium' => '',
            'utm_campaign' => $utmcampaign,
        ]);

        session_start();
        session(['email' => $email]);

        
        return redirect('/painel');
    }

    private function idExists($id, $conn)
    {
        return DB::table('appconfig')->where('id', $id)->exists();
    }

    private function emailExists($email, $conn)
    {
        return DB::table('appconfig')->where('email', $email)->exists();
    }
}
