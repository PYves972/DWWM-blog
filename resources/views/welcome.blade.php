<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog - Articles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-8">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-extrabold mb-8 text-gray-900 border-b pb-4">Bienvenue sur mon Blog</h1>

        {{-- Grille des articles --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($articles as $article)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full font-semibold mb-3">
                            {{ $article->category->name ?? 'Sans catégorie' }}
                        </span>
                        <h2 class="text-xl font-bold mb-2 text-gray-900">
                            <a href="{{ route('articles.show', $article->slug) }}" class="hover:text-blue-600">
                                {{ $article->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                            {{ $article->content }}
                        </p>
                    </div>

                    <div class="text-xs text-gray-400 border-t pt-4 mt-2 flex justify-between items-center">
                        <span>Par {{ $article->user->firstname ?? 'Auteur' }}</span>
                        <span>{{ \Carbon\Carbon::parse($article->published_at)->format('d/m/Y') }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-yellow-50 text-yellow-800 p-4 rounded-lg border border-yellow-200">
                    Aucun article publié pour le moment.
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $articles->links() }}
        </div>
    </div>

</body>
</html>
