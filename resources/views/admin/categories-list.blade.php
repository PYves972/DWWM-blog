<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des Catégories</title>
</head>
<body>
    <h1>Liste des catégories</h1>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</body>
</html>
