<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Popote' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" style="background-color: #EAE2B7;">

    <!-- Header -->
    <header class="shadow" style="background-color: #FCBF49;">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <h1 style="color: #003049">Popote</h1>
                <ul class="flex space-x-6">
                    <x-nav-link href="{{ route('home') }}" :active="Route::is('home')">
                        Accueil
                    </x-nav-link>
                    <x-nav-link href="{{ route('recipes.index') }}" :active="Route::is('recipes.*')">
                        Recettes
                    </x-nav-link>
                    <x-nav-link href="{{ route('categories.index') }}" :active="Route::is('categories.*')">
                        Catégories
                    </x-nav-link>
                    <x-nav-link href="{{ route('recipes.create') }}" :active="Route::is('recipes.create')">
                        Créer une recette
                    </x-nav-link>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main content -->
    <main class="container mx-auto px-4 py-8 flex flex-col">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-auto text-black" style="background-color: #FCBF49;">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} - Popote</p>
        </div>
    </footer>

</body>
</html>
