<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\AfiliateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CronjobsController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\GameOverController;
use App\Http\Controllers\IndiciController;
use App\Http\Controllers\JogarController;
use App\Http\Controllers\JogoDemoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObrigadoController;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\Pix1Controller;
use App\Http\Controllers\PixController;
use App\Http\Controllers\PresellController;
use App\Http\Controllers\SaqueAfiliadoController;
use App\Http\Controllers\SaqueController;
use App\Http\Controllers\SeederController;
use App\Http\Controllers\UpsellController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\CadastrarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/cadastrar', [CadastrarController::class, 'index']);
Route::post('/cadastrar', [CadastrarController::class, 'store']);
Route::get('/painel', [PainelController::class, 'index']);
Route::get('/logout', [AuthController::class,'clearSession']);
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/afiliate', [AfiliateController::class, 'index']);
Route::get('/deposito', [DepositoController::class, 'index'])->name('deposito.index');
Route::post('/deposito', [DepositoController::class, 'deposito']);
Route::get('/deposito/pix', [PixController::class,'index'])->name('deposito.pix');
Route::get('/jogar', [JogarController::class,'index'])->name('jogar.index');
Route::post('/jogar', [JogarController::class,'index']);
Route::get('/jogodemo', [JogoDemoController::class,'index'])->name('jododemo.index');
Route::post('/jogodemo', [JogoDemoController::class,'index']);
Route::post('/jogodemopresell', [JogoDemoController::class,'indexPresell'])->name('jododemopresell.indexPresell');
Route::get('/jogodemopresell', [JogoDemoController::class,'indexPresell']);
Route::get('/obrigado', [ObrigadoController::class,'index'])->name('obrigado.index');
Route::get('/presell', [PresellController::class,'index'])->name('presell.index');
Route::get('/gameover/win', [GameOverController::class,'win'])->name('gameover.win');
Route::get('/gameover/loss', [GameOverController::class,'loss'])->name('gameover.loss');
Route::post('/gameover/win', [GameOverController::class,'win']);
Route::post('/gameover/loss', [GameOverController::class,'loss']);
Route::get('/loss', [PresellController::class,'loss'])->name('presell.loss');
Route::get('/saque', [SaqueController::class,'index'])->name('saque.index');
Route::post('/saque', [SaqueController::class,'saque']);
Route::get('/saque-afiliado', [SaqueAfiliadoController::class, 'index']);
Route::get('/upsell', [UpsellController::class,'index']);
Route::post('/webhook', [WebhookController::class,'index']);
Route::get('/webhook', [WebhookController::class,'index']);
Route::post('/webhook/pix', [WebhookController::class,'pix'])->name('webhook.pix');
Route::get('/webhook/pix', [WebhookController::class,'pix'])->name('getWebhook.pix');
Route::get('/cronjobs/otimizarbanco', [CronjobsController::class,'otimizarbanco']);
Route::get('/checkout-taxapix', [CheckoutController::class,'taxapix']);
Route::get('/checkout-taxa', [CheckoutController::class,'taxa']);
Route::get('/checkout-subwayvip', [CheckoutController::class,'subwayvip']);
Route::post('/checkout-taxapix', [CheckoutController::class,'taxapix']);
Route::post('/checkout-taxa', [CheckoutController::class,'taxa']);
Route::post('/checkout-subwayvip', [CheckoutController::class,'subwayvip']);
Route::get('/pix1', [Pix1Controller::class,'index']);
Route::get('/', [IndiciController::class,'index']);
Route::get('/windemo', [JogoDemoController::class, 'windemo']);
Route::get('/lossdemo', [JogoDemoController::class, 'lossdemo']);
Route::post('/windemo', [JogoDemoController::class, 'windemo']);
Route::post('/lossdemo', [JogoDemoController::class, 'lossdemo']);
Route::get('/consultarpagamento', [DepositoController::class, 'consultaPagamento']);
Route::post('/consultarpagamento', [DepositoController::class, 'consultaPagamento']);
Route::get('/cronjobs', [CronjobsController::class, 'index']);
Route::get('/adm',[AdmController::class,'index']);
Route::get('/adm/login',[AdmController::class,'login']);
Route::post('/adm/login',[AdmController::class,'login']);
Route::post('/adm/processos',[AdmController::class,'processo']);
Route::get('/adm/GGR',[AdmController::class,'GGR']);
Route::get('/adm/usuarios',[AdmController::class,'usuarios']);
Route::post('/adm/usuarios',[AdmController::class,'usuarios']);
Route::get('/adm/bd',[AdmController::class,'bd']);
Route::get('/adm/usuarios',[AdmController::class,'usuarios']);
Route::post('/adm/update',[AdmController::class,'update']);
Route::get('/adm/depositos',[AdmController::class,'depositos']);
Route::get('/adm/utm',[AdmController::class,'utm']);
Route::get('/seedDatabase',[SeederController::class,'runSeeder']);
Route::get('/legal',[PainelController::class,'legal']);
Route::get('/adm/gateway',[AdmController::class,'gateway']);
Route::post('/adm/gatewayUpdate',[AdmController::class,'gatewayUpdate']);