<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class SeederController extends Controller
{
    public function runSeeder()
    {
        // Executa o seeder desejado
        Artisan::call('db:seed', ['--class' => 'AppconfigSeeder']);

        return 'Seeder executado com sucesso!';
    }
}