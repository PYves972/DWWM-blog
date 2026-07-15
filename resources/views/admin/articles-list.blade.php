<h1>Espace Administration - Gestion des Articles</h1>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr style="background-color: #f4f4f4; border-bottom: 2px solid #ccc; text-align: left;">
            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Titre</th>
            <th style="padding: 10px;">Catégorie</th>
            <th style="padding: 10px;">Statut</th>
            <th style="padding: 10px;">Date de création</th>
            <th style="padding: 10px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 10px;">{{ $article->id }}</td>
                <td style="padding: 10px;"><strong>{{ $article->titre }}</strong></td>
                <td style="padding: 10px;">{{ $article->category->name ?? 'Aucune' }}</td>
                <td style="padding: 10px;">
                    <span style="padding: 3px 8px; border-radius: 4px; font-size: 0.9em;
                        background-color: {{ $article->statut === 'published' ? '#d4edda' : '#fff3cd' }};
                        color: {{ $article->statut === 'published' ? '#155724' : '#856404' }};">
                        {{ $article->statut }}
                    </span>
                </td>
                <td style="padding: 10px;">{{ $article->created_at->format('d/m/Y H:i') }}</td>
                <td style="padding: 10px;">
                    <!-- On prépare les futurs boutons d'action -->
                    <button style="cursor: pointer;">Modifier</button>
                    <button style="color: red; cursor: pointer;">Supprimer</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
