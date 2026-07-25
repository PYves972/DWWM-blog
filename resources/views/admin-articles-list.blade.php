@extends('layouts.app')

@section('title', 'Administration - Articles')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Gestion des Articles</h1>
        <button class="bg-black text-white px-4 py-2 text-sm font-bold hover:bg-gray-800">
            + Créer un Article
        </button>
    </div>

    <div class="bg-white border border-gray-300 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Titre</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Auteur</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($articles as $article)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $article->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 py-1 text-xs font-bold bg-gray-100 border border-gray-300 rounded">
                                {{ $article->category->name ?? 'Aucune' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $article->user->name ?? 'Inconnu' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $article->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900">Modifier</a>
                            <button class="text-red-600 hover:text-red-900">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Aucun article trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
