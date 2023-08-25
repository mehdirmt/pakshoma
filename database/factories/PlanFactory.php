<?php

namespace Database\Factories;

use App\Enums\PlanTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'      => fake()->sentence(),
            'percent'    => fake()->numberBetween(0, 40),
            'start_date' => fake()->date('Y-m-d', '+1 week'),
            'end_date'   => fake()->date('Y-m-d', '+1 month')
        ];
    }
}
