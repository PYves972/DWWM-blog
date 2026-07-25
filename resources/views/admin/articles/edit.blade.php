<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer l'Article - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen py-10">

    <div class="max-w-3xl mx-auto px-4">

        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-slate-800">Éditer l'article</h1>
            <a href="{{ route('admin.articles.index') }}" class="text-slate-600 hover:text-slate-900 text-sm font-medium">
                ← Retour à la liste
            </a>
        </div>

        <!-- Formulaire -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200">
            <form action="{{ route('admin.articles.update', $article) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT') <!-- Requis par Laravel pour les mises à jour -->

                <!-- Titre -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-1">Titre de l'article</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                           class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Catégorie -->
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-1">Catégorie</label>
                    <select name="category_id" id="category_id" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Statut -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-slate-700 mb-1">Statut</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Publié</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contenu -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-slate-700 mb-1">Contenu</label>
                    <textarea name="content" id="content" rows="6"
                              class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>{{ old('content', $article->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton de validation -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg font-medium text-sm hover:bg-slate-300">
                        Annuler
                    </a>
                    <button type="submit" class="px-4 py-2 bg-amber-600 text-white rounded-lg font-medium text-sm hover:bg-amber-700 shadow-sm">
                        Mettre à jour
                    </button>
                </div>

            </form>
        </div>

    </div>

</body>
</html>
