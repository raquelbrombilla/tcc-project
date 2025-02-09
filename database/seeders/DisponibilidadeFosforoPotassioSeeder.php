<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisponibilidadeFosforoPotassioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disponibilidade_fosforo_potassio')->insert([
            [
                'parametro' => 'Argila',
                'teor_minimo' => 60,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 3,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 60,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 3.1,
                'valor_maximo' => 6,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 60,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 6.1,
                'valor_maximo' => 9,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 60,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 9.1,
                'valor_maximo' => 18,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 60,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 18.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 41,
                'teor_maximo' => 60,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 4,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 41,
                'teor_maximo' => 60,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 4.1,
                'valor_maximo' => 8,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 41,
                'teor_maximo' => 60,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 8.1,
                'valor_maximo' => 12,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 41,
                'teor_maximo' => 60,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 12.1,
                'valor_maximo' => 24,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 41,
                'teor_maximo' => 60,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 24.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 21,
                'teor_maximo' => 40,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 6,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 21,
                'teor_maximo' => 40,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 6.1,
                'valor_maximo' => 12,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 21,
                'teor_maximo' => 40,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 12.1,
                'valor_maximo' => 18,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 21,
                'teor_maximo' => 40,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 18.1,
                'valor_maximo' => 36,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 21,
                'teor_maximo' => 40,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 36.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 0,
                'teor_maximo' => 20,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 10,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 0,
                'teor_maximo' => 20,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 10.1,
                'valor_maximo' => 20,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 0,
                'teor_maximo' => 20,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 20.1,
                'valor_maximo' => 30,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 0,
                'teor_maximo' => 20,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 30.1,
                'valor_maximo' => 60,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'Argila',
                'teor_minimo' => 0,
                'teor_maximo' => 20,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 60.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 2
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 0,
                'teor_maximo' => 7.5,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 20,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 0,
                'teor_maximo' => 7.5,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 20.1,
                'valor_maximo' => 40,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 0,
                'teor_maximo' => 7.5,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 40.1,
                'valor_maximo' => 60,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 0,
                'teor_maximo' => 7.5,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 60.1,
                'valor_maximo' => 120,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 0,
                'teor_maximo' => 7.5,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 120.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 7.6,
                'teor_maximo' => 15,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 30,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 7.6,
                'teor_maximo' => 15,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 30.1,
                'valor_maximo' => 60,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 7.6,
                'teor_maximo' => 15,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 60.1,
                'valor_maximo' => 90,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 7.6,
                'teor_maximo' => 15,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 90.1,
                'valor_maximo' => 180,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 7.6,
                'teor_maximo' => 15,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 180.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 15.1,
                'teor_maximo' => 30,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 40,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 15.1,
                'teor_maximo' => 30,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 40.1,
                'valor_maximo' => 80,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 15.1,
                'teor_maximo' => 30,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 80.1,
                'valor_maximo' => 120,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 15.1,
                'teor_maximo' => 30,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 120.1,
                'valor_maximo' => 240,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 15.1,
                'teor_maximo' => 30,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 240.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 3
            ],

            [
                'parametro' => 'CTC',
                'teor_minimo' => 30.1,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MUITO BAIXO',
                'valor_minimo' => 0,
                'valor_maximo' => 45,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 30.1,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'BAIXO',
                'valor_minimo' => 45.1,
                'valor_maximo' => 90,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 30.1,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MÉDIO',
                'valor_minimo' => 90.1,
                'valor_maximo' => 135,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 30.1,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'ALTO',
                'valor_minimo' => 135.1,
                'valor_maximo' => 270,
                'macronutriente_id' => 3
            ],
            [
                'parametro' => 'CTC',
                'teor_minimo' => 30.1,
                'teor_maximo' => 1000,
                'classe_disponibilidade' => 'MUITO ALTO',
                'valor_minimo' => 270.1,
                'valor_maximo' => 1000,
                'macronutriente_id' => 3
            ],
           
        ]);
    }
}
