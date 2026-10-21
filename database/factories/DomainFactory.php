<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\Registrar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName(),
            'registrar_id' => Registrar::factory(), // sesuaikan jika ada seeder registrars
            'hosting' => fake()->randomElement([
                '-', 'Shared Hosting', 'Cloud Hosting',
                'WordPress Hosting', 'Unlimited Hosting',
                'VPS', 'Dedicated Server',
            ]),
            'registration_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'expiry_date' => fake()->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
            'renewal_cost' => fake()->randomFloat(2, 5, 100),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
