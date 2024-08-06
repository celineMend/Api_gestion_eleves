<?php

namespace Database\Factories;
use App\Models\Ue;
use App\Models\Eleve;
use App\Models\Matiere;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => $this->faker->numberBetween(0, 20),
            'date' => $this->faker->date(),
            'eleve_id' => Eleve::factory(), // Génère un ID pour 'eleve_id'
            'ue_id' => Ue::factory(),
            'matiere_id' => Matiere::factory(),
        ];
    }
}
