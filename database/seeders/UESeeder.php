<?php

namespace Database\Seeders;
use App\Models\UE;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UESeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ue::factory(10)->create();
    }
}
