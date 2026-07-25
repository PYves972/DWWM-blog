<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition(): array
{
    $title = fake()->sentence();

    return [
        'title'       => $title,                            // <-- au lieu de 'titre'
        'slug'        => \Illuminate\Support\Str::slug($title),
        'content'     => fake()->paragraphs(3, true),       // <-- au lieu de 'contenu'
        'status'      => 'published',                      // <-- au lieu de 'statut'
        'category_id' => \App\Models\Category::factory(),  // ou un ID existant
        'user_id'     => \App\Models\User::factory(),      // ou un ID existant
    ];
}

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
