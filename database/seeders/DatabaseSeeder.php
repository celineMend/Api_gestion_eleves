<?php

namespace Database\Seeders;
use App\Models\UE;
use App\Models\User;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Evaluation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            EleveSeeder::class,
            MatiereSeeder::class,
            UESeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}
