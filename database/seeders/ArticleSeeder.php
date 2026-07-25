<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        // 1. On crée d'abord un utilisateur fictif pour être l'auteur des articles
        $user = \App\Models\User::factory()->create();

        // On récupère toutes les catégories existantes
        $categories = \App\Models\Category::all();

        // Pour chaque catégorie, on crée 3 articles
        foreach ($categories as $category) {
            \App\Models\Article::factory(3)->create([
                'category_id' => $category->id,
                'user_id' => $user->id, // 2. On lie l'article à notre utilisateur !
                'statut' => 'published',
            ]);
        }
    }
}
