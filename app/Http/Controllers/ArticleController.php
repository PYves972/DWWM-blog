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
     * Vue publique : Liste des articles publiés (avec filtre par catégorie optionnel)
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $articles = Article::with(['category', 'user'])
            ->where('status', 'published')
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->latest()
            ->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Vue publique : Afficher un article par son slug
     */
    public function show($slug)
    {
        $article = Article::with(['category', 'user'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    /**
     * Admin : Liste de TOUS les articles
     */
    public function adminIndex()
    {
        $this->authorizeAdmin();

        $articles = Article::with(['category', 'user'])->latest()->paginate(10);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Admin : Formulaire de création
     */
    public function create()
    {
        $this->authorizeAdmin();

        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Admin : Enregistrement d'un nouvel article
     */
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status'      => 'required|in:draft,published',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['user_id'] = Auth::id(); // Récupère directement l'ID de l'admin connecté

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article créé avec succès !');
    }

    /**
     * Admin : Formulaire d'édition d'un article
     */
    public function edit(Article $article)
    {
        $this->authorizeAdmin();

        $categories = Category::all();

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Admin : Mettre à jour un article
     */
    public function update(Request $request, Article $article)
    {
        $this->authorizeAdmin();

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
        $this->authorizeAdmin();

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article supprimé avec succès !');
    }

    /**
     * Helper privé pour vérifier si l'utilisateur courant est administrateur
     */
private function authorizeAdmin(): void
{
    /** @var \App\Models\User|null $user */
    $user = Auth::user();

    if (! $user || ! $user->isAdmin()) {
        abort(403, 'Accès non autorisé.');
    }
}
}
