<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DWWM Blog')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-900 font-sans antialiased">

    <header class="border-b border-gray-300 py-4 mb-8">
        <div class="max-w-6xl mx-auto px-4 flex justify-between items-center">
            <div class="w-12 h-12 border-2 border-black flex items-center justify-center font-bold text-xl">
                &#9744;
            </div>

            <div class="space-x-6 text-sm font-medium">
                <a href="#" class="underline hover:text-gray-600">Se connecter</a>
                <a href="#" class="underline hover:text-gray-600">S'inscrire</a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>
