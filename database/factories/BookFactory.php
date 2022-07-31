<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "author_id" => fake()->numberBetween(1, 50),
            "category_id" => fake()->numberBetween(1, 150),
            "book_title" => fake()->sentence(3),
        ];
    }
}