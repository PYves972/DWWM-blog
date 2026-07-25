@extends('layouts.app')

@section('content')
<div class="py-6">
    <h1 class="text-3xl font-bold mb-8 border-b pb-4">Bienvenue sur mon Blog</h1>

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
                        {{ Str::limit($article->content, 120) }}
                    </p>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                    <span>Par {{ $article->user->name ?? 'Anonyme' }}</span>
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-blue-600 font-medium hover:underline">
                        Lire la suite &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full p-4 bg-gray-50 text-gray-600 rounded-lg text-center">
                Aucun article publié pour le moment.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</div>
@endsection
