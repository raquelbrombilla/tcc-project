<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropriedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('propriedade')->insert([
            [
                'nome' => 'Fazenda Strobel',
                'user_id' => 2
            ],
            [
                'nome' => 'Fazenda 2',
                'user_id' => 2
            ]
        ]);
    }
}
