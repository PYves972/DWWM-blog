<p><a href="{{ route('articles.index') }}">← Retour à la liste des articles</a></p>

<article>
    <h1>{{ $article->titre }}</h1>
    <p>
        <strong>Catégorie :</strong> {{ $article->category->name ?? 'Aucune' }} |
        <strong>Auteur :</strong> {{ $article->user->name ?? 'Anonyme' }} |
        <strong>Publié le :</strong> {{ $article->created_at->format('d/m/Y') }}
    </p>

    <hr>

    <div class="content">
        {{ $article->contenu }}
    </div>
</article>
