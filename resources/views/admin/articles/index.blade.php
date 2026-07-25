<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Articles</h1>
                <p class="text-sm text-gray-500">Espace d'administration du blog</p>
            </div>
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow transition">
                + Nouvel Article
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-xs font-semibold uppercase text-gray-500 tracking-wider">
                        <th class="py-3 px-4">Titre</th>
                        <th class="py-3 px-4">Catégorie</th>
                        <th class="py-3 px-4">Auteur</th>
                        <th class="py-3 px-4">Statut</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($articles as $article)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 px-4 font-semibold text-gray-900">
                                {{ $article->title }}
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                    {{ $article->category->name ?? 'Sans catégorie' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                {{ $article->user ? $article->user->firstname : 'Inconnu' }}
                            </td>
                            <td class="py-3 px-4">
                                @if($article->status === 'published')
                                    <span class="bg-green-100 text-green-800 text-xs px-2.5 py-0.5 rounded-full font-semibold">Publié</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-0.5 rounded-full font-semibold">Brouillon</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-600 hover:text-blue-900 font-semibold text-xs" target="_blank">Voir</a>
                                <a href="#" class="text-amber-600 hover:text-amber-900 font-semibold text-xs">Éditer</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500 italic">Aucun article disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
</body>
</html>