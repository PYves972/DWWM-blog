<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller\Auth\RegisteredUserController;
use App\Models\Article; // <-- Import du modèle Article ajouté ici
use Illuminate\Support\Facades\Route;

// Route d'accueil mise à jour avec l'envoi des $articles
Route::get('/', function () {
    $articles = Article::latest()->paginate(6);

    return view('welcome', compact('articles'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 1. Route pour la liste des articles avec son nom
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

    // 2. Route pour lire un article spécifique
    Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
});

require __DIR__.'/auth.php';
