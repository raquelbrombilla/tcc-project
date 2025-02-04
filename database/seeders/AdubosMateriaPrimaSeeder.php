<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdubosMateriaPrimaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adubos_materia_prima')->insert([
            [
                'macronutriente_id' => 1,
                'nome' => 'Ureia (44%)',
                'porcentagem' => 44
            ],
            [
                'macronutriente_id' => 1,
                'nome' => 'Nitrato de Cálcio (14%)',
                'porcentagem' => 14
            ],
            [
                'macronutriente_id' => 1,
                'nome' => 'Salitre do Chile (15%)',
                'porcentagem' => 15
            ],
            [
                'macronutriente_id' => 1,
                'nome' => 'Sulfato de Amônio (20%)',
                'porcentagem' => 20
            ],
            [
                'macronutriente_id' => 1,
                'nome' => 'Nitrato de Amônio (32%)',
                'porcentagem' => 32
            ],
            [
                'macronutriente_id' => 1,
                'nome' => 'Amônia Anidra (82%)',
                'porcentagem' => 82
            ],
            [
                'macronutriente_id' => 2,
                'nome' => 'Superfosfato Triplo (SFT, 41% em CNA + água)',
                'porcentagem' => 41
            ],
            [
                'macronutriente_id' => 2,
                'nome' => 'Superfosfato Triplo (SFT, 36% em água)',
                'porcentagem' => 36
            ],
            [
                'macronutriente_id' => 2,
                'nome' => 'Superfosfato Simples (SFS, 18% em CNA + água)',
                'porcentagem' => 18
            ],
            [
                'macronutriente_id' => 2,
                'nome' => 'Superfosfato Simples (SFS, 15% em água)',
                'porcentagem' => 15
            ],
            [
                'macronutriente_id' => 3,
                'nome' => 'Cloreto de Potássio (KCl, 58%)',
                'porcentagem' => 58
            ],
            [
                'macronutriente_id' => 3,
                'nome' => 'Sulfato de Potássio (K₂SO₄, 48%)',
                'porcentagem' => 48
            ],
        ]); 
    }
}
