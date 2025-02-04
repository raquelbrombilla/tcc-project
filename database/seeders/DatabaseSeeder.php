<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([ 
            UsersSeeder::class,
            PropriedadesSeeder::class,
            MacronutrientesSeeder::class,
            DisponibilidadeFosforoPotassioSeeder::class,
            CulturasSeeder::class,
            AnalisesSoloSeeder::class,
            DemandaMacronutrienteCulturaSeeder::class,
            DemandaNitrogenioCulturaSeeder::class,
            AcrescimoRendimentoCulturasSeeder::class,
            AdubosMateriaPrimaSeeder::class,
        ]);
    }
}
