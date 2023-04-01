<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'details'       => $this->faker->sentences(4, true),
            'client'         => $this->faker->name(),
            'is_fulfilled' => $this->faker->boolean(),
        ];
    }
}
