<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Assure-toi que cette ligne est présente pour utiliser Str

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $titre = fake()->sentence(); // On génère le titre d'abord...

        return [
            'titre' => $titre,
            'slug' => Str::slug($titre), // ...et on transforme ce titre en slug ! (ex: "Mon Titre" -> "mon-titre")
            'contenu' => fake()->paragraph(),
            'statut' => 'draft',
            'category_id' => null,
            'user_id' => null,
        ];
    }
}

