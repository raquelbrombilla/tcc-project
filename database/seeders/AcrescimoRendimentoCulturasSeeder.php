<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcrescimoRendimentoCulturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acrescimo_rendimento_culturas')->insert([
            [
                'cultura_id' => 1,
                't_ha_acrescimo_rendimento' => 3,
                'macronutriente_id' => 2,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 15,
            ],
            [
                'cultura_id' => 1,
                't_ha_acrescimo_rendimento' => 3,
                'macronutriente_id' => 3,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 25,
            ],

            [
                'cultura_id' => 2,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 2,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 15,
            ],
            [
                'cultura_id' => 2,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 3,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 10,
            ],
            [
                'cultura_id' => 2,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 1,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 15,
            ],

            [
                'cultura_id' => 3,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 2,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 15,
            ],
            [
                'cultura_id' => 3,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 3,
                'cultura_anterior' => null,
                'kg_acrescimo_ha' => 10,
            ],
            [
                'cultura_id' => 3,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 1,
                'cultura_anterior' => 'LEGUMINOSA',
                'kg_acrescimo_ha' => 20,
            ],
            [
                'cultura_id' => 3,
                't_ha_acrescimo_rendimento' => 6,
                'macronutriente_id' => 1,
                'cultura_anterior' => 'GRAMÍNEA',
                'kg_acrescimo_ha' => 30,
            ],
        ]); 
    }
}
