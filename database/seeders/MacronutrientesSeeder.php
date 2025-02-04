<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MacronutrientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('macronutrientes')->insert([
            [
                'nome' => 'Nitrogênio',
                'abreviacao' => 'N',
                'medida' => 'kg de N/ha'
            ],
            [
                'nome' => 'Fósforo',
                'abreviacao' => 'P',
                'medida' => 'kg de P₂O₅/ha'
            ],
            [
                'nome' => 'Potássio',
                'abreviacao' => 'K',
                'medida' => 'kg de K₂O/ha'
            ],
        ]); 
    }
}
