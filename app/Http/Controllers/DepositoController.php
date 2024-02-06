<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Contracts\Encryption\DecryptException;

class DepositoController extends Controller
{
    protected $depositoMinimo;

    public function __construct()
    {
        $depositoMin = DB::table('app')
        ->select('deposito_min')
        ->first();

        $this->depositoMinimo = $depositoMin ? floatval($depositoMin->deposito_min) : 2;
    }

    public function index()
    {
        // Obtenha as credenciais do gateway
        

        // Obtenha a URL e a Callback URL
        $callbackUrl = route('webhook.pix');


        // Obtenha o email e jogoteste da sessão
        $email = session('email');  // ajuste conforme a sua lógica de sessão
        $jogoteste = session('jogoteste');  // ajuste conforme a sua lógica de sessão

        // Verifique se a jogoteste não é 1
        if ($this->check_jogoteste($email, $jogoteste)) {
            // Atualize a coluna jogoteste para 1
            $this->update_jogoteste($email);
        }

        // Restante do código...

        return view('deposito.index', ['depositoMinimo' => $this->depositoMinimo, 'callbackUrl' => $callbackUrl]);
    }

    public function deposito(Request $request)
    {
        // Obtenha o formulário do request
        $form = $this->get_form($request);
        $email = session('email');
        // Valide o formulário
        $errors = $this->validate_form($form);
        
        // Se houver erros, redirecione de volta à página de depósito com os erros

        $gatewayCredentials = $this->get_gateway_credentials();
        $gatewayCredentialsArray = is_object($gatewayCredentials) ? get_object_vars($gatewayCredentials) : [];
        $client_id = $gatewayCredentialsArray['client_id'];
        $client_secret = $gatewayCredentialsArray['client_secret'];
        // Faça a solicitação PIX
        $res = $this->makePix($form['name'], $form['cpf'], $form['value'], $client_id, $client_secret);
        
        // Verifique a resposta da solicitação PIX
        if (isset($res['paymentCode'])) {
            // Adicione a coluna 'data' e obtenha a data atual no formato dd/mm/aaaa hh:mm:ss, no horário de Brasília
            $userDate = $this->get_user_date();

            // Insira os dados na tabela confirmar_deposito
            $this->insert_confirmar_deposito($email, $form['value'], $res['idTransaction'], 'WAITING_FOR_APPROVAL', $userDate);

            $cookie = cookie('token', $res['idTransaction'], 10);
            return redirect()->route('deposito.pix', ['pix_key' => $res['paymentCode']])->withCookie($cookie);
        } else {
            // Se a resposta não for 'OK', redirecione de volta à página de depósito
            return redirect()->route('deposito.index');
        }
    }

    // Métodos auxiliares...

    protected function get_gateway_credentials()
    {
        // Obtenha as credenciais do gateway
        return DB::table('gateway')->select('client_id', 'client_secret')->first();
    }

    protected function check_jogoteste($email, $jogoteste)
    {
        // Verifique se a jogoteste não é 1
        return DB::table('appconfig')->where('email', $email)
            ->where(function ($query) {
                $query->whereNull('jogoteste')->orWhere('jogoteste', '!=', 1);
            })->exists();
    }

    protected function update_jogoteste($email)
    {
        // Atualize a coluna jogoteste para 1
        DB::table('appconfig')->where('email', $email)->update(['jogoteste' => 1]);
    }

    protected function get_user_date()
    {
        // Adiciona a coluna 'data' e obtém a data atual no formato dd/mm/aaaa hh:mm:ss, no horário de Brasília
        $brtTimeZone = new DateTimeZone('America/Sao_Paulo');
        $dateTime = new DateTime('now', $brtTimeZone);
        return $dateTime->format('Y-m-d H:i:s');
    }

    protected function insert_confirmar_deposito($email, $value, $idTransaction, $status, $userDate)
    {
        
        DB::table('confirmar_deposito')->insert([
            'email' => $email,
            'valor' => $value,
            'externalreference' => $idTransaction,
            'status' => $status,
            'data' => $userDate,
        ]);
    }

    public function makePix($name, $cpf, $value, $clientId, $clientSecret)
    {

        $callbackUrl = route('webhook.pix');

        $payload = [
            'requestNumber' => '12356',
            'dueDate' => $this->get_user_date(),
            'amount' => floatval($value),
            'client' => [
                'name' => $name,
                'email' => 'cliente@email.com',
                'document' => $cpf,
            ],
            'callbackUrl' => $callbackUrl,
        ];


        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'ci' => $clientId,
            'cs' => $clientSecret,
        ])->post('https://ws.suitpay.app/api/v1/gateway/request-qrcode', $payload);


        $res = $response->json();

        return $res;
    }

    protected function get_form(Request $request)
    {
        return [
            'name' => $request->input('name'),
            'cpf' => $request->input('document'),
            'value' => $request->input('valor_transacao'),
            // Adicione outros campos do formulário conforme necessário
        ];
    }

    protected function validate_form($form)
    {
        $errors = [];

        // Exemplo de validação para o campo 'name'
        if (empty($form['name'])) {
            $errors['name'] = 'O campo Nome é obrigatório.';
        }

        // Exemplo de validação para o campo 'cpf'
        if (empty($form['cpf'])) {
            $errors['cpf'] = 'O campo CPF é obrigatório.';
        }

        // Adicione outras validações conforme necessário

        return $errors;
    }
    
    public function consultaPagamento(Request $request){
        
        
        function bad_request()
        {
            
            return response()->json(400);
            
        }
        
        if (!session()->has('token')) {
            bad_request();
        }
        
        
        
    
        
        $externalReference = $request->query('token');
        
        
        $result = DB::table('confirmar_deposito')
        ->select('status')
        ->where('externalreference', $externalReference)
        ->first();
        
        if (!$result) {
            
            return response()->json(['message' => 'Token inválido'], 400);
        }
        
        return response()->json($result, 200);

    }
    

}
