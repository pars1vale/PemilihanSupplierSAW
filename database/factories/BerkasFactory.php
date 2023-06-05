<?php

namespace Database\Factories;

use App\Models\Berkas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BerkasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->randomNumber(8),
            'ktp' => $this->faker->image('public/storage/images',640,480, null, false),
            'slip_gaji' => $this->faker->image('public/storage/images',640,480, null, false),
        ];
    }
}
