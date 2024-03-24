<?php 

namespace App\Services;

use App\Models\Appconfig;

class LimparBanco
{
    public function limpar()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        Appconfig::where('depositou', '>', 60)->where('data_cadastro', '<', now()->subDays(2))->delete();
        Appconfig::where('depositou', 0)->where('data_cadastro', '<', now()->subDays(3))->delete();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
