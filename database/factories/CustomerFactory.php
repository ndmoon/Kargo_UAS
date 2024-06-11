<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap'=>fake()->name(),
            'email'=>fake()->unique()->safeEmail(),
            'no_telp'=>fake()->bothify('###############'),
            'alamat'=>$this->faker->address()
        ];
    }
}
