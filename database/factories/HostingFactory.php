<?php

namespace Database\Factories;

use App\Models\Hosting;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Hosting>
 */
class HostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'package_name' => fake()->word().' Hosting',
            'main_domain' => fake()->domainName(),
            'provider_id' => Provider::factory(), // sesuaikan jika ada seeder providers
            'purchase_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'expiry_date' => fake()->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            'renewal_cost' => fake()->randomFloat(2, 5, 200),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
