<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Vps;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vps>
 */
class VpsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_name' => fake()->word().' VPS',
            'provider_id' => Provider::factory(), // sesuaikan jika ada seeder providers
            'purchase_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'expiry_date' => fake()->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            'renewal_cost' => fake()->randomFloat(2, 10, 500),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
