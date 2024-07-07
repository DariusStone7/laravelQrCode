<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->name(),
            'lastname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'card_number' => fake()->creditCardNumber(),
            'birthday' => fake()->date(),
            'address' => fake()->address(),
            'sexe' => 'Masculin',
            'matricule' => fake()->phoneNumber(),
        ];
    }
}
