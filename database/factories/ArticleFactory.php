<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence(4);

        return [
            'title'        => $title,
            'slug'         => Str::slug($title),
            'content'      => fake()->paragraphs(3, true),
            'status'       => fake()->randomElement(['draft', 'published']),
            'published_at' => fake()->optional(0.8)->dateTimeBetween('-1 year', 'now'),

            // Si tu as gardé les deux conventions de nommage :
            'category_id'  => Category::factory(),
            'id_category'  => function (array $attributes) {
                return $attributes['category_id'];
            },
            'user_id'      => User::factory(),
            'id_user'      => function (array $attributes) {
                return $attributes['user_id'];
            },
        ];
    }
}
