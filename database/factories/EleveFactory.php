<?php

namespace Database\Factories;
use App\Models\Eleve;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\eleve>
 */
class EleveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'matricule' => $this->faker->unique()->numerify('MAT#####'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password', // Ce sera hashé automatiquement grâce au setter
            'image' => $this->faker->imageUrl(),
        ];

    }
}
