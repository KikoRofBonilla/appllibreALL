<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'title' => fake()->sentence(3),
            'author' => fake()->name(),
            'isbn' => fake()->numerify('978##########'),
            'publisher' => fake()->company(),
            'pages' => fake()->numberBetween(120, 700),
            'synopsis' => fake()->paragraph(),
            'published_at' => fake()->dateTimeBetween('-40 years', 'now')->format('Y-m-d'),
            'total_copies' => 3,
            'available_copies' => 3,
        ];
    }
}
