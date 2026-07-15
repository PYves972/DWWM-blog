<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Vue Visiteur : Liste des articles publiés
     */
    public function index()
    {
        // On récupère uniquement les articles publiés, du plus récent au plus ancien
        // avec le chargement en amont (eager loading) des relations pour éviter le problème de requêtes N+1
        $articles = Article::with('category')
            ->where('statut', 'published')
            ->latest()
            ->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Vue Admin : Liste de tous les articles (brouillons inclus)
     */
   public function adminIndex()
{
    // On ajoute 'category' pour pouvoir afficher la catégorie de chaque article côté admin
    $articles = Article::with('category')->latest()->get();

    return view('admin.articles-list', compact('articles'));
}
    public function show($slug)
{
    // On cherche l'article qui a ce slug ET qui est publié
    $article = Article::with('category', 'user')
        ->where('slug', $slug)
        ->where('statut', 'published')
        ->firstOrFail(); // Renvoie une erreur 404 si l'article n'existe pas

    return view('articles.show', compact('article'));
}
}

