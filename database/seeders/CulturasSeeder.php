<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('culturas')->insert([
            [
                'cultura' => 'Soja',
            ],
            [
                'cultura' => 'Milho',
            ],
            [
                'cultura' => 'Trigo',
            ],
        ]); 
    }
}
