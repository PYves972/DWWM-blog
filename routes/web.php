<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

// --- ROUTES PUBLIQUES (Visiteurs & Connectés) ---

// Route d'accueil
Route::get('/', function () {
    $articles = Article::latest()->paginate(6);
    return view('welcome', compact('articles'));
})->name('home');

// Consultation des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');


// --- ROUTES PROTÉGÉES (Utilisateurs connectés uniquement) ---
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- ESPACE ADMIN (Administrateurs uniquement) ---
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.index');
        Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
        Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });
});

// Importation des routes d'authentification Laravel Breeze / Fortify (inclut déjà /logout)
require __DIR__.'/auth.php';
