<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Vue publique : Liste des articles publiés
     */
    public function index()
    {
$articles = Article::with(['category', 'user']) // <-- Ajout recommandé
        ->where('status', 'published')
        ->latest()
        ->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Vue publique : Afficher un article par son slug
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('articles.show', compact('article'));
    }

    /**
     * Admin : Liste de TOUS les articles
     */
    public function adminIndex()
    {
        $articles = Article::with(['category', 'user'])->latest()->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Admin : Formulaire de création
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Admin : Enregistrement d'un nouvel article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['user_id'] = Auth::id() ?? 1;

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article créé avec succès !');
    }

    /**
     * Admin : Formulaire d'édition d'un article
     */
    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Admin : Mettre à jour un article
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $article->update($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article mis à jour avec succès !');
    }

    /**
     * Admin : Supprimer un article
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article supprimé avec succès !');
    }
}
