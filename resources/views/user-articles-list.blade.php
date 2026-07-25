@extends('layouts.app')

@section('title', 'Liste des Articles')

@section('content')
    <div class="flex flex-col sm:flex-row gap-4 mb-8">
        <span class="self-center font-medium text-gray-700">Filtres :</span>

        <div class="relative">
            <select class="appearance-none bg-white border border-black px-4 py-2 pr-10 focus:outline-none cursor-pointer">
                <option>Toutes les catégories</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <div class="relative">
            <select class="appearance-none bg-white border border-black px-4 py-2 pr-10 focus:outline-none cursor-pointer">
                <option>Tous les tags</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>

    <hr class="border-gray-300 mb-8">

    <div class="space-y-6">
        @forelse($articles as $article)
            <div class="border border-black p-6 bg-white shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start text-sm mb-2 text-gray-600">
                    <div class="flex flex-wrap gap-2">
                        <span class="font-bold">[ {{ $article->category->name ?? 'Sans catégorie' }} ]</span>
                        <span class="text-gray-500">[ Tag 1 ]</span>
                    </div>
                    <span class="text-gray-500">{{ $article->created_at->translatedFormat('d M. Y') }}</span>
                </div>

                <h2 class="text-xl font-bold mb-3 text-black">{{ $article->title }}</h2>

                <div class="flex justify-between items-end gap-4">
                    <p class="text-gray-700 text-sm max-w-4xl line-clamp-2">
                        {{ Str::limit($article->content, 180) }}
                    </p>
                    <a href="{{ route('articles.show', $article->id) }}" class="underline font-bold text-sm hover:text-gray-600 whitespace-nowrap">Lire &rarr;</a>
                </div>
            </div>
        @empty
            <p class="text-center py-8 text-gray-500">Aucun article disponible pour le moment.</p>
        @endforelse
    </div>

    <div class="flex justify-center items-center gap-6 mt-12 mb-8">
        <button class="bg-black text-white px-6 py-2 text-sm font-bold hover:bg-gray-800 disabled:opacity-50">
            &larr; Précédent
        </button>
        <span class="text-sm font-medium">Page 1 / 4</span>
        <button class="bg-black text-white px-6 py-2 text-sm font-bold hover:bg-gray-800">
            Suivant &rarr;
        </button>
    </div>
@endsection
