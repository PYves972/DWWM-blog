<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Création / Récupération de l'Admin
        $user = User::firstOrCreate(
            ['email' => 'admin@blog.fr'],
            [
                'firstname' => 'Jean',
                'lastname'  => 'Dupont',
                'password'  => bcrypt('password'),
                'role'      => 'admin',
            ]
        );

        // 2. Création de 4 catégories
        $categories = collect(['Technologie', 'Design', 'Tutoriels', 'Actualités'])->map(function ($name) {
            return Category::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($name)],
                ['name' => $name]
            );
        });

        // 3. Génération directe de 20 articles en base de données
        foreach (range(1, 20) as $i) {
            $category = $categories->random();

            Article::create([
                'title'        => fake()->unique()->sentence(4),
                'slug'         => fake()->unique()->slug(),
                'content'      => fake()->paragraphs(3, true),
                'status'       => 'published',
                'published_at' => now(),
                'category_id'  => $category->id,
                'id_category'  => $category->id, // Doublon
                'user_id'      => $user->id,
                'id_user'      => $user->id,     // Doublon
            ]);
        }
    }
}
