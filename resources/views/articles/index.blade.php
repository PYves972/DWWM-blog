<h1>Bienvenue sur mon Blog</h1>

<div class="articles-list">
    @foreach($articles as $article)
        <article style="margin-bottom: 30px; border-bottom: 1px solid #ccc; padding-bottom: 20px;">
           <h2><a href="{{ route('articles.show', $article->slug) }}">{{ $article->titre }}</a></h2>
            <p><strong>Catégorie :</strong> {{ $article->category->name ?? 'Aucune' }}</p>
            <p>{{ $article->contenu }}</p>
        </article>
    @endforeach
</div>
