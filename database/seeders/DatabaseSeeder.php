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
        // 1. Utilisateur
        $user = User::create([
            'firstname' => 'Jean',
            'lastname'  => 'Dupont',
            'email'     => 'admin@blog.fr',
            'password'  => bcrypt('password'),
            'role'      => 'admin',
        ]);

        // 2. Catégorie
        $category = Category::create([
            'name' => 'Technologie',
            'slug' => 'technologie',
        ]);

        // 3. Article (avec les 4 colonnes réclamées par la BDD)
        Article::create([
            'title'        => 'Mon premier article sur Laravel',
            'slug'         => 'mon-premier-article-sur-laravel',
            'content'      => 'Voici le contenu de mon super premier article de blog !',
            'status'       => 'published',
            'published_at' => now(),
            'id_category'  => $category->id,
            'category_id'  => $category->id, // <- Ajout indispensable
            'id_user'      => $user->id,
            'user_id'      => $user->id,
        ]);
    }
}
