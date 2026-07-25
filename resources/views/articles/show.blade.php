<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Mon Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 p-8">

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-8">

        {{-- Bouton Retour --}}
        <a href="{{ route('articles.index') }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 mb-6 transition">
            ← Retour à la liste des articles
        </a>

        {{-- En-tête de l'article --}}
        <header class="mb-8 border-b pb-6">
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold mb-3">
                {{ $article->category->name ?? 'Sans catégorie' }}
            </span>

            <h1 class="text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                {{ $article->title }}
            </h1>

            <div class="flex items-center text-sm text-gray-500 space-x-4">
                <span>
                    Par <strong class="text-gray-700">
                        {{ $article->user ? $article->user->firstname . ' ' . $article->user->lastname : 'Anonyme' }}
                    </strong>
                </span>
                <span>•</span>
                <span>Publié le {{ \Carbon\Carbon::parse($article->published_at)->format('d/m/Y') }}</span>
            </div>
        </header>

        {{-- Contenu de l'article --}}
        <article class="prose prose-blue max-w-none text-gray-700 text-lg leading-relaxed mb-8">
            {!! nl2br(e($article->content)) !!}
        </article>

        {{-- Tags associées --}}
        @if($article->tags && $article->tags->count() > 0)
            <div class="border-t pt-4 flex items-center space-x-2 mb-8">
                <span class="text-xs font-semibold text-gray-400 uppercase">Tags :</span>
                @foreach($article->tags as $tag)
                    <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-md font-medium">
                        #{{ $tag->name }}
                    </span>
                @endforeach
            </div>
        @endif

        {{-- Section Commentaires --}}
        <section class="border-t pt-8 mt-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">
                Commentaires ({{ $article->comments ? $article->comments->count() : 0 }})
            </h2>

            @forelse($article->comments ?? [] as $comment)
                <div class="bg-gray-50 rounded-lg p-4 mb-4 border border-gray-100">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-bold text-gray-800 text-sm">
                            {{ $comment->user ? $comment->user->firstname : 'Visiteur' }}
                        </span>
                        <span class="text-xs text-gray-400">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="text-gray-600 text-sm">{{ $comment->content }}</p>
                </div>
            @empty
                <p class="text-gray-400 text-sm italic">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
            @endforelse
        </section>

    </div>

</body>
</html>
