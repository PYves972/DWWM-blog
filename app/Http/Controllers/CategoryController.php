<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Vue Admin : Liste des catégories avec le compteur d'articles
     */
    public function index()
    {
        // withCount('articles') va injecter un attribut "articles_count" dans chaque objet Category
        $categories = Category::withCount('articles')->get();


        return view('categories', compact('categories'));
    }
}
