<?php

namespace Database\Factories;

use App\Models\Appconfig;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AppConfigFactory extends Factory
{
    protected $model = Appconfig::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'senha' => Hash::make('password'), // você pode ajustar conforme necessário
            'cpf' => $this->faker->numerify('###########'),
            'telefone' => $this->faker->phoneNumber,
            'saldo' => $this->faker->randomFloat(2, 0, 1000),
            'jogoteste' => $this->faker->boolean,
            'linkafiliado' => $this->faker->url,
            'depositou' => $this->faker->randomNumber(),
            'utm_campaign' => "Jonh",
            'lead_aff' => $this->faker->randomNumber(),
            'leads_ativos'  => $this->faker->randomNumber(),
            'rollover1' => $this->faker->randomNumber(),
            'plano'  => $this->faker->randomNumber(),
            'demo'  => $this->faker->randomNumber(),
            'bloc'  => $this->faker->randomNumber(),
            'sacou' => $this->faker->randomNumber(),
            'indicados'  => $this->faker->randomNumber(),
            'saldo_comissao'  => $this->faker->randomNumber(),
            'percas'  => $this->faker->randomNumber(),
            'ganhos'  => $this->faker->randomNumber(),
            'cpa' => $this->faker->randomNumber(),
            'cpafake' => $this->faker->randomNumber(),
            'jogo_demo'  => $this->faker->randomNumber(),
            'comissaofake'=> $this->faker->randomNumber(),
            'saldo_cpa'=> $this->faker->randomNumber(),
            'primeiro_deposito'=> $this->faker->randomNumber(),
            'status_primeiro_deposito'=> $this->faker->randomNumber(),
            'cont_cpa'=> $this->faker->randomNumber(),
            'afiliado'=> $this->faker->randomNumber(),
            'utm_source'=> $this->faker->randomNumber(),
            'utm_medium'=> $this->faker->randomNumber(),
        ];
    }
}