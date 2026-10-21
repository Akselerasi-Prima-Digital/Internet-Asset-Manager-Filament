<?php

namespace Database\Factories;

use App\Models\Registrar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Registrar>
 */
class RegistrarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
        ];
    }
}
