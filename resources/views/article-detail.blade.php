@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="flex flex-col sm:flex-row gap-4 mb-8">
        <span class="self-center font-medium text-gray-700">Filtres :</span>
        <div class="relative">
            <select class="appearance-none bg-white border border-black px-4 py-2 pr-10 focus:outline-none cursor-pointer" disabled>
                <option>Toutes les catégories</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>

        <div class="relative">
            <select class="appearance-none bg-white border border-black px-4 py-2 pr-10 focus:outline-none cursor-pointer" disabled>
                <option>Tous les tags</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>

    <hr class="border-gray-300 mb-6">

    <article class="max-w-4xl">
        <a href="{{ route('articles.index') }}" class="inline-block text-sm underline hover:text-gray-600 mb-6">
            &larr; Retour à la liste
        </a>

        <div class="flex flex-wrap gap-2 text-sm text-gray-600 mb-2">
            <span class="font-bold">[ {{ $article->category->name ?? 'Sans catégorie' }} ]</span>
            <span class="text-gray-500">[ Tag 1 ]</span>
            <span class="text-gray-500">[ Tag 2 ]</span>
        </div>

        <h1 class="text-3xl font-extrabold text-black mb-2">
            {{ $article->title }}
        </h1>

        <div class="text-sm text-gray-600 mb-6">
            Par <span class="font-semibold">{{ $article->user->name ?? 'Auteur inconnu' }}</span>
            &middot;
            <span>{{ $article->created_at->translatedFormat('d M. Y') }}</span>
        </div>

        <hr class="border-black mb-6">

        <div class="prose max-w-none text-gray-800 leading-relaxed text-justify mb-12">
            {!! nl2br(e($article->content)) !!}
        </div>

        <hr class="border-black mb-6">
    </article>
@endsection
