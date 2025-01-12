<?php

namespace Database\Seeders;

use App\Models\Ingresos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngresoSeed extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingresos::factory()->count(100)->create();
    }
}
