<?php

namespace Database\Seeders;

use App\Models\Deudas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeudaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deudas::factory()->count(100)->create();
    }
}
