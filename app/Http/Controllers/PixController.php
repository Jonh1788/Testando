<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PixController extends Controller
{
    protected function get_user_date()
    {
        // Adiciona a coluna 'data' e obtém a data atual no formato dd/mm/aaaa hh:mm:ss, no horário de Brasília
        $brtTimeZone = new \DateTimeZone('America/Sao_Paulo');
        $dateTime = new \DateTime('now', $brtTimeZone);
        return $dateTime->format('Y-m-d H:i:s');
    }


    public function index(Request $request){

        if(!session()->has('email')){
            return redirect('/login');
        }

        $email = session('email');

        $externalReference = $request->query('externalReference');
        $valor = $request->query('value');

        session(['externalReference' => $externalReference]);
        session(['value' => $valor]);

        $status = 'pendente';

        if(!session()->has($externalReference) && !session()->has($email) && !session()->has($valor)){

            try{

                $count = DB::table('confirmar_deposito')
                ->where('email',$email)
                ->where('externalReference', $externalReference)
                ->count();
                
                if($count == 0){
                    DB::table('confirmar_deposito')->insert([
                        'email' => $email,
                        'externalReference' => $externalReference,
                        'status' => $status,
                        'valor' => $valor,
                        'data' => $this->get_user_date(),
                    ]);
                } else {

                } 
            } catch(\Exception $e) {

                return response()->json(['error' => $e->getMessage()], 500);
            }
        }


        return view('deposito.pix', compact('email'));
    }
}
