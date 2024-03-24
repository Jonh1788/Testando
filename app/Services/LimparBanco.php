<?php 

namespace App\Services;

use App\Models\Appconfig;

class LimparBanco
{
    public function limpar()
    {
        Appconfig::where('depositou', '>', 60)->where('data_cadastro', '<', now()->subDays(2))->delete();
        Appconfig::where('depositou', 0)->where('data_cadastro', '<', now()->subDays(3))->delete();
    }
}
