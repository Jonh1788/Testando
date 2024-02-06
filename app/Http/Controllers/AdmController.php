<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdmController extends Controller
{
    public function index(Request $request){

        if(!session()->has('emailadm')){
            return redirect('adm/login');
        }

        $status = $request->has('status') ? $request->query('status') : null;

        $numeroDepositos = DB::table('confirmar_deposito')->whereNotNull('valor');

        if($status){
            $numeroDepositos->where('status', $status);
        }

        $valorTotalDepositos = DB::table('confirmar_deposito')
        ->where('status', '=', 'PAID_OUT')
        ->sum('valor');

        $quantidadeNumeroDepositos = $numeroDepositos->count();
        
        $result = DB::table('app')
        ->get()->toArray();
        
        $quantidadeUsuarios = DB::table('appconfig')
        ->count();

        $totalSaques = DB::table('saques')
        ->count();

        $valorTotalSaques = DB::table('saques')
        ->where('status', '!=', 'Aguardando Aprovação')
        ->sum('valor');

        
       
        return view("adm.index", ["result"=> (array)$result[0], "quantidadeUsuarios" => $quantidadeUsuarios, 'quantidadeNumeroDepositos' => $quantidadeNumeroDepositos, 'valorTotalDepositos' => $valorTotalDepositos, 'totalSaques' => $totalSaques, 'valorTotalSaques' => $valorTotalSaques]);
    }

    public function processo(Request $request){

        try{

        if(!session()->has('emailadm')) {
            return redirect('adm/login');
        }

        if (!$request->isMethod('post')) {
            return response()->json(['message' => 'Metódo não permitido'] , 405);
        }

        function required($form, $field)
        {
            if (!isset($form[$field]) || !$form[$field]) {
                return "$field é requerido";
            }

            return null;
        }

        function validate_form($form, $fields)
        {
            foreach ($fields as $field) {
                if ($error = required($form, $field)) {
                    return $error;
                }
            }

            return null;
        }

        function get_form($request)
        {
            return array(
                'valor' => $request->input('valor'),
            );
        }
        
        $form = get_form($request);
        $error = validate_form($form, ['valor']);
        $valor = $form['valor'];

        if ($request->has('opcao')) {
            $opcao = $request->query('opcao');
        }

        $result = DB::table('app')
        ->get();

        if ($error) {
            $msg = $error;
            var_dump($msg);
            var_dump($form);

        }else{
            
            switch($opcao){
                case "depositoMin":

                        if ($result->count() > 0) {
                            $result_update = DB::table('app')
                            ->update(['deposito_min' => $valor]);
                            
                            if ($result_update > 0) {
                                return redirect('../adm');
                                
                            } else {
                                return redirect('../adm');
                            }
                        } else {

                            $result_insert = DB::table('app')->insert(['deposito_min' => $valor]);

                            
                            if ($result_insert) {
                                return redirect('../adm');
                            } else {
                                return redirect('../adm');
                            }
                        }

                case "saqueMin":

                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                        ->update(['saques_min' => $valor]);
                        
                        if ($result_update > 0) {
                            return redirect('../adm');
                            
                        } else {
                            return redirect('../adm');
                        }
                    } else {

                        $result_insert = DB::table('app')->insert(['saques_min' => $valor]);

                        
                        if ($result_insert) {
                            return redirect('../adm');
                        } else {
                            return redirect('../adm');
                        }
                    }

                case "apostaMax":
                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                        ->update(['aposta_max' => $valor]);
                        
                        if ($result_update > 0) {
                            return redirect('../adm');
                            
                        } else {
                            return redirect('../adm');
                        }
                    } else {

                        $result_insert = DB::table('app')->insert(['aposta_max' => $valor]);

                        
                        if ($result_insert) {
                            return redirect('../adm');
                        } else {
                            return redirect('../adm');
                        }
                        }
                        
                       
                case "apostaMin":
                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                        ->update(['aposta_min' => $valor]);
                        
                        if ($result_update > 0) {
                            return redirect('../adm');
                            
                        } else {
                            return redirect('../adm');
                        }
                    } else {

                        $result_insert = DB::table('app')->insert(['aposta_min' => $valor]);

                        
                        if ($result_insert) {
                            return redirect('../adm');
                        } else {
                            return redirect('../adm');
                        }
                        }
                        
                case "rolloverSaque":
                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                            ->update(['rollover_saque' => $valor]);
                            
                            if ($result_update > 0) {
                                return redirect('../adm');
                                
                            } else {
                                return redirect('../adm');
                            }
                        } else {

                            $result_insert = DB::table('app')->insert(['rollover_saque' => $valor]);

                            
                            if ($result_insert) {
                                return redirect('../adm');
                            } else {
                                return redirect('../adm');
                            }
                        }
                        
                case "taxaSaque":
                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                        ->update(['taxa_saque' => $valor]);
                        
                        if ($result_update > 0) {
                            return redirect('../adm');
                            
                        } else {
                            return redirect('../adm');
                        }
                    } else {

                        $result_insert = DB::table('app')->insert(['taxa_saque' => $valor]);

                        
                        if ($result_insert) {
                            return redirect('../adm');
                        } else {
                            return redirect('../adm');
                        }
                        }

                case "dificuldadeJogo":
                    
                    if ($result->count() > 0) {
                        $result_update = DB::table('app')
                        ->update(['dificuldade_jogo' => $valor]);
                        
                        if ($result_update > 0) {
                            return redirect('../adm');
                            
                        } else {
                            return redirect('../adm');
                        }
                    } else {

                        $result_insert = DB::table('app')->insert(['dificuldade_jogo' => $valor]);

                        
                        if ($result_insert) {
                            return redirect('../adm');
                        } else {
                            return redirect('../adm');
                        }
                        }
                default:
                    echo "entrei default";
                    break;
            }

        }
        }catch(\Exception $ex){
                var_dump($ex);
                exit;
            }
        }
    public function login(Request $request){

        
        //$vida_sessao = 15 * 60;
        //session_set_cookie_params($vida_sessao);

        try{
            if($request->isMethod('post')){

                $email = $request->input('email');
                $senha = $request->input('senha');

                $result = DB::table('admlogin')
                ->where('email', $email)
                ->where('senha', $senha)
                ->first();

                if($result){
                    session(['emailadm' => $email]);
                    return redirect('/adm');
                } else {
                    $erro = 'Email ou senha incorretos';
                    return view('adm.login', compact('erro'));
                }
            }    
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }

        return view('adm.login');


    }

    public function GGR(Request $request){

        if(!session()->has('emailadm')){
            return redirect('../adm/login');
        }

        $total_percas = DB::table('ggr')
        ->select('total_percas', 'ggr_total','ggr_taxa')
        ->first();

        
        return view('adm.ggr', ['total_percas' => $total_percas->total_percas,
                                 'ggr_total' => $total_percas->ggr_total,
                                 'ggr_taxa' => $total_percas->ggr_taxa]);
    }

    public function usuarios(Request $request){
        
        if(!session()->has('emailadm')){
            return redirect('/adm/login');
        }

        try {

            $leadAff = $request->has('leadAff') ? $request->query('leadAff') : null;

            $result = DB::table('appconfig')->select("id");

            if (!empty($leadAff)) {
               
                $result->where('leadAff', $leadAff);
            }

            $result = $result->orderBy('data_cadastro', 'desc')
            ->get();

            if (!$result) {
                die("Erro na consulta");
            }

            
            $sqlTotal = "SELECT COUNT(*) as total FROM appconfig";
            $resultTotal = DB::table('appconfig');
           
            if (!empty($leadAff)) {
                $resultTotal->where('lead_aff', $leadAff);
            }

            $resultTotal = $resultTotal->count();

            $total = ($resultTotal && $resultTotal > 0) ? $resultTotal : 0;

            $dataAgora = Carbon::now('America/Sao_paulo');

            $dataUmDiaAntes = $dataAgora->copy()->subDay();

            $resultUltimas24h = DB::table('appconfig')->whereBetween('data_cadastro', [$dataUmDiaAntes, $dataAgora]);
            // Adicionar cláusula WHERE se o parâmetro leadAff estiver presente
            if (!empty($leadAff)) {
                $resultUltimas24h->where('lead_aff', $leadAff);
            }

            $resultUltimas24h = $resultUltimas24h->get()->toArray();

            

            $ultimas24h = count($resultUltimas24h);

            return view('adm.usuarios', compact('ultimas24h', 'total'));

        } catch(\Exception $e) {
            var_dump($e);
            return response()->json(['message' => $e],200);
        }
    }

    public function bd(Request $request){

        if(!session()->has('emailadm')){
            return redirect('/adm/login');
        }

        try {
            
            
            
            $leadAff = $request->has('leadAff') ? $request->query('leadAff') : null;

            $result = DB::table('appconfig')
            ->select('id','data_cadastro','email','senha','telefone','saldo','linkafiliado','plano','depositou','bloc','saldo_comissao','percas','ganhos',
            'cpa','cpafake','comissaofake');
            if (!empty($leadAff)) {
                $result->where('afiliado', $leadAff);
            }

            $result->orderBy('data_cadastro', 'desc');
            $result = $result->get();

            if ($result->isEmpty()) {
                die("Erro na consulta");
            }
            
            $data = $result->toArray();

            
     
            return response()->json($data, 200);
        } catch(\Exception $e) {
            var_dump($e);
            return response()->json(['error' => $e], 200);
        }

    }

    public function update(Request $request){

        if(!session()->has('emailadm')){
            return redirect('adm/login');
        }
        
        if (!$request->isMethod('post')) {
            return response()->json(['error'=> 'Metódo não permitido'], 405);
        }

        function get_form($request)
        {
            return array(
                'id' => $request->input('id'),
                'email' => $request->input('email'),
                'senha' => $request->input('senha'),
                'telefone' => $request->input('telefone'),
                'saldo' => $request->input('saldo'),
                'linkafiliado' => $request->input('linkafiliado'),
                'plano' => $request->input('plano'),
                'depositou' => $request->input('depositou'),
                'bloqueado' => $request->input('bloqueado'),
                'saldo_comissao' => $request->input('saldo_comissao'),
                'percas' => $request->input('percas'),
                'ganhos' => $request->input('ganhos'),
                'cpa' => $request->input('cpa'),
                'cpafake' => $request->input('cpafake'),
                'comissaofake' => $request->input('comissaofake'),
            );
        }

        $form = get_form($request);

        try{
            $result = DB::table('appconfig')
            ->where('id', $request->input('id'),)
            ->update([
                'email' => $request->input('email'),
                'senha' => $request->input('senha'),
                'telefone' => $request->input('telefone'),
                'saldo' => $request->input('saldo'),
                'linkafiliado' => $request->input('linkafiliado'),
                'plano' => $request->input('plano'),
                'bloc' => $request->input('bloqueado') ? $request->input('bloqueado') : 0,
                'saldo_comissao' => $request->input('saldo_comissao'),
                'cpa' => $request->input('cpa'),
                
                
            ]);

            if($result){
                return redirect('adm/usuarios');

            } else {
                return response('', 400);
            }
        } catch (\Exception $ex) {
            return response($ex, 500);
        }

    }

    public function depositos(Request $request){

        if(!session()->has('emailadm')){
            return redirect('adm/login');
        }

        $depositosRealizados = DB::table('confirmar_deposito')
        ->whereNotNull('valor')
        ->get()->toArray();

        


        
        return view('adm.depositos', compact('depositosRealizados'));
    }

    public function utm(Request $request){

        $campanhas = DB::table('appconfig')
        ->whereNotNull('utm_campaign')
        ->where('utm_campaign','!=', '')
        ->groupBy('utm_campaign')
        ->select('utm_campaign', DB::raw('SUM(depositou) as total_deposito'), DB::raw('COUNT(*) as total_cadastros'))
        ->get();

        $campanhas2 = DB::table('appconfig')
        ->whereNotNull('utm_campaign')
        ->where('utm_campaign','!=', '')
        ->where('depositou','>',0)
        ->select('email', 'utm_campaign')
        ->get()
        ->groupBy('utm_campaign');

        $resultArray = [];
        
        foreach($campanhas2 as $campanha => $group){
            $utmArray = [];
            
            foreach($group as $result){
                
                $deposits = DB::table('confirmar_deposito')
                ->where('email', $result->email)
                ->get();
                
                $depositsArray = [];

                foreach($deposits as $deposit){
                    $depositsArray[] = [
                        'valor' => $deposit->valor,
                        'data' => $deposit->data,
                    ];
                }
                
                if(!empty($depositsArray)){

                    $utmArray[] = [
                        'deposits' => $depositsArray
                    ];
                }
            }

            if(!empty($utmArray)){
                $resultArray[$campanha] = $utmArray;
            }
        }

       
   
        
        
        
        return view('adm.utm', compact('campanhas','resultArray'));
    }


}
