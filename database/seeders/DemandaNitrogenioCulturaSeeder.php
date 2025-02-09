<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DemandaNitrogenioCulturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('demanda_nitrogenio_cultura')->insert([
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 70,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 50,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 40,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 80,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 60,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 40,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 80,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 60,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 2,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 40,
                'medida' => 'kg de N/ha',
            ],            
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 70,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 50,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'LEGUMINOSA',
                'quantidade' => 40,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 80,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 60,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'GRAMÍNEA',
                'quantidade' => 40,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 0,
                'teor_materia_org_maximo' => 2.5,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 90,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 2.6,
                'teor_materia_org_maximo' => 5,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 70,
                'medida' => 'kg de N/ha',
            ],
            [
                'cultura_id' => 3,
                'teor_materia_org_minimo' => 5.1,
                'teor_materia_org_maximo' => 1000,
                'cultura_anterior' => 'POUSIO',
                'quantidade' => 50,
                'medida' => 'kg de N/ha',
            ],
        ]);
    }
}
