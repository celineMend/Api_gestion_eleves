<?php

namespace Database\Factories;
use App\Models\Matiere;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->sentence(2),
            'date_debut' => $this->faker->dateTimeThisYear(),
            'date_fin' => $this->faker->dateTimeThisYear(),
        ];
    }
}
