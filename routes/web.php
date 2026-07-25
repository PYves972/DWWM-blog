<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Front-Office (Publiques - Accessibles à tous)
|--------------------------------------------------------------------------
*/

// Redirection de la racine vers la liste des articles
Route::get('/', function () {
    return redirect()->route('articles.index');
});

// Liste publique des articles publiés (URL: /articles)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Détail d'un article par son SLUG (URL: /articles/mon-premier-article)
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Formulaire de création
Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
// Traitement du formulaire
Route::post('/admin/articles', [ArticleController::class, 'store'])->name('admin.articles.store');
/*
|--------------------------------------------------------------------------
 Routes Back-Office (Administration)

|--------------------------------------------------------------------------
| Note: Plus tard, vous ajouterez ici le middleware de vérification 'admin'
*/
// Routes pour l'administration des articles (CRUD)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
Route::prefix('admin')->name('admin.')->group(function () {

    // Gestion des articles (URL: /admin/articles)
    Route::get('/articles', [ArticleController::class, 'adminIndex'])->name('articles.index');

    // Gestion des catégories (URL: /admin/categories)
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

});
