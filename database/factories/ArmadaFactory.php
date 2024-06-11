<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'max_weight'=>fake()->randomNumber(4, true),
            'length'=>fake()->numberBetween(100, 300),
            'width'=>fake()->numberBetween(100, 300),
            'height'=>fake()->numberBetween(100, 300)
        ];
    }
}
