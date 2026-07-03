<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('home');
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
