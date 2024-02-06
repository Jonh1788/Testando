<?php

namespace Database\Seeders;

use App\Models\Appconfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\AppConfigFactory;
class AppconfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appconfig::factory()->count(1000)->create();
    }
}
