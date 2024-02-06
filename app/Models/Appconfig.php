<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appconfig extends Model
{   
    use HasFactory;
    protected $table = 'appconfig';
    protected $fillable = [
        'id',
        'nome', 'email', 'senha', 'cpf', 'telefone', 'saldo',
        'jogoteste', 'linkafiliado', 'depositou', 'lead_aff',
        'leads_ativos', 'rollover1', 'plano', 'demo', 'bloc',
        'sacou', 'indicados', 'saldo_comissao', 'percas', 'ganhos',
        'cpa', 'cpafake', 'jogo_demo', 'comissaofake', 'saldo_cpa',
        'primeiro_deposito', 'status_primeiro_deposito', 'cont_cpa',
        'data_cadastro', 'afiliado', 'utm_source', 'utm_medium', 'utm_campaign',
    ];

    public $timestamps = false;
}
