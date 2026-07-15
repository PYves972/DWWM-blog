<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Génère 5 catégories fictives
        \App\Models\Category::factory(5)->create();

        // Appelle le seeder des articles
        $this->call([
            ArticleSeeder::class,
        ]);
    }
}
