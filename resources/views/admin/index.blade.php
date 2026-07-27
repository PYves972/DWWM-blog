<h1>TEST</h1>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Message de succès après création / édition / suppression -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-lg text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <!-- En-tête de la page -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Gestion des Articles</h1>
        <p class="text-gray-500">Espace d'administration du blog</p>
    </div>

    <div class="flex items-center gap-4">
        {{-- Bouton de déconnexion --}}
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-3 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                    🚪 Se déconnecter
                </button>
            </form>
        @endauth

        {{-- Bouton créer un article --}}
        <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">
            + Nouvel Article
        </a>
    </div>
</div>

        <!-- Tableau -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200/80 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200/80 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="py-4 px-6">TITRE</th>
                        <th class="py-4 px-6 text-center">CATÉGORIE</th>
                        <th class="py-4 px-6 text-center">AUTEUR</th>
                        <th class="py-4 px-6 text-center">STATUT</th>
                        <th class="py-4 px-6 text-right">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/80 transition-colors">

                            <!-- Titre -->
                            <td class="py-4 px-6 font-semibold text-slate-900">
                                {{ $article->title }}
                            </td>

                            <!-- Catégorie -->
                            <td class="py-4 px-6 text-center">
                                <span class="inline-block bg-slate-100 text-slate-600 px-3 py-1 rounded-md text-xs font-medium">
                                    {{ $article->category->name ?? 'Non catégorisé' }}
                                </span>
                            </td>

                            <!-- Auteur -->
                            <td class="py-4 px-6 text-center text-slate-600 font-medium">
                                {{ $article->user->name ?? $article->author ?? 'Inconnu' }}
                            </td>

                            <!-- Statut -->
                            <td class="py-4 px-6 text-center">
                                @if(($article->status ?? null) === 'published' || ($article->is_published ?? false))
                                    <span class="inline-block bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-medium">
                                        Publié
                                    </span>
                                @else
                                    <span class="inline-block bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-medium">
                                        Brouillon
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-6 text-right space-x-3">
                                <!-- LIEN ACTIF : Voir -->
                                <a href="{{ route('articles.show', $article->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-800 font-medium">
                                    Voir
                                </a>

                                <!-- LIEN ACTIF : Éditer -->
                                <a href="{{ route('admin.articles.edit', $article) }}" class="text-amber-600 hover:text-amber-800 font-medium">
                                    Éditer
                                </a>

                                <!-- BOUTON ACTIF : Supprimer -->
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                                        Supprimer
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-500">
                                Aucun article disponible.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            @if($articles->hasPages())
                <div class="p-4 border-t border-slate-100 bg-slate-50/50">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>

    </div>

</body>
</html>
