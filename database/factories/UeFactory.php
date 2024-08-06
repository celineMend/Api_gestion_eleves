<?php

namespace Database\Factories;
use App\Models\UE;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ue>
 */
class UeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->sentence(3),
            'date_debut' => $this->faker->dateTimeThisYear(),
            'date_fin' => $this->faker->dateTimeThisYear(),
            'coef' => $this->faker->randomFloat(2, 1, 5),

        ];
    }
}
