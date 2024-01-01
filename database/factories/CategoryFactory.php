<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id' => fake()->numberBetween(1,10),
            'id' => fake()->unique(),
            // ->numberBetween(1, 10),
            'cat_name' => fake()->words(1, true),

        ];
    }
}
