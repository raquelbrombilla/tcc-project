<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AnalisesSoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analises_solo')->insert([
            [
                'data_analise' => '2024-06-19',
                'nome_talhao' => 'Talhão 1',
                'area_ha' => 1,
                'estado' => 'RS',
                'municipio' => 'Dois Irmãos das Missões',
                'latitude' => -27.6910702453461,
                'longitude' => -53.5747424715335,
                'argila' => 60,
                'ph' => 5.8,
                'indice_smp' => 5.8,
                'fosforo' => 12,
                'potassio' => 267,
                'materia_organica' => 3.6,
                'aluminio' => 0,
                'calcio' => 6.9,
                'magnesio' => 2.9,
                'hidrogenio_aluminio' => 5.5,
                'ctc_solo' => 16,
                'saturacao_bases' => 66,
                'saturacao_aluminio' => 0,
                'enxofre' => 16,
                'zinco' => 3.3,
                'cobre' => 11,
                'boro' => 1.4,
                'manganes' => 14,
                'ferro' => null,
                'user_id' => 2,
                'propriedade_id' => 1
            ],
            [
                'data_analise' => '2024-06-19',
                'nome_talhao' => 'Talhão 1',
                'area_ha' => 1,
                'estado' => 'RS',
                'municipio' => 'Dois Irmãos das Missões',
                'latitude' => -27.692466394058,
                'longitude' => -53.5763779070947,
                'argila' => 60,
                'ph' => 6.4,
                'indice_smp' => 6.3,
                'fosforo' => 41,
                'potassio' => 319,
                'materia_organica' => 4.2,
                'aluminio' => 0,
                'calcio' => 8.8,
                'magnesio' => 3.6,
                'hidrogenio_aluminio' => 3.1,
                'ctc_solo' => 16.3,
                'saturacao_bases' => 81,
                'saturacao_aluminio' => 0,
                'enxofre' => 12,
                'zinco' => 7.6,
                'cobre' => 6.3,
                'boro' => 1.5,
                'manganes' => 6,
                'ferro' => null,
                'user_id' => 2,
                'propriedade_id' => 1
            ],
            [
                'data_analise' => '2024-06-19',
                'nome_talhao' => 'Talhão 1',
                'area_ha' => 1,
                'estado' => 'RS',
                'municipio' => 'Dois Irmãos das Missões',
                'latitude' => -27.69249620321,
                'longitude' => -53.574775948467,
                'argila' => 60,
                'ph' => 6.2,
                'indice_smp' => 6.2,
                'fosforo' => 16,
                'potassio' => 172,
                'materia_organica' => 3.9,
                'aluminio' => 0,
                'calcio' => 7.4,
                'magnesio' => 3.2,
                'hidrogenio_aluminio' => 3.5,
                'ctc_solo' => 14.5,
                'saturacao_bases' => 76,
                'saturacao_aluminio' => 0,
                'enxofre' => 14,
                'zinco' => 6.4,
                'cobre' => 12,
                'boro' => 1.4,
                'manganes' => 7,
                'ferro' => null,
                'user_id' => 2,
                'propriedade_id' => 1
            ],
            [
                'data_analise' => '2024-06-19',
                'nome_talhao' => 'Talhão 1',
                'area_ha' => 1,
                'estado' => 'RS',
                'municipio' => 'Dois Irmãos das Missões',
                'latitude' => -27.6925259938631,
                'longitude' => -53.5731739873817,
                'argila' => 60,
                'ph' => 5.9,
                'indice_smp' => 6,
                'fosforo' => 20,
                'potassio' => 194,
                'materia_organica' => 3.6,
                'aluminio' => 0,
                'calcio' => 8,
                'magnesio' => 3.4,
                'hidrogenio_aluminio' => 4.4,
                'ctc_solo' => 16.3,
                'saturacao_bases' => 73,
                'saturacao_aluminio' => 0,
                'enxofre' => 28,
                'zinco' => 7.7,
                'cobre' => 12,
                'boro' => 1.6,
                'manganes' => 10,
                'ferro' => null,
                'user_id' => 2,
                'propriedade_id' => 1
            ]
        ]);
    }
}
