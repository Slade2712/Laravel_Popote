<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/img/Popote_Without_BG.svg">
    <title>Popote</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col" style="background-color: #EAE2B7;">

    {{-- HEADER --}}
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <a href="/" class="flex items-center space-x-3">
                <img src="/img/Popote_Without_BG.svg" alt="Logo" class="w-12 h-12">
                <span class="text-2xl font-bold text-black">
                    <span class="text-gold">Popote</span> & Co
                </span>
            </a>

            <nav class="hidden md:flex space-x-8 text-lg font-medium">
                <a href="/" class="text-black hover:text-gold transition">Accueil</a>
                <a href="/recipes" class="text-black hover:text-gold transition">Recettes</a>
                <a href="/categories" class="text-black hover:text-gold transition">Catégories</a>
                <a href="/about" class="text-black hover:text-gold transition">À propos</a>
            </nav>

            <a href="/recipes/create"
                class="hidden md:block bg-gold hover:bg-dark-mustard text-white font-semibold py-2 px-5 rounded-xl shadow transition">
                + Nouvelle recette
            </a>

            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <div x-show="open" x-collapse
                    class="absolute right-4 mt-3 bg-white shadow-lg rounded-xl py-3 px-6 space-y-3 text-lg font-medium">

                    <a href="/" class="block text-black hover:text-gold transition">Accueil</a>
                    <a href="/recipes" class="block text-black hover:text-gold transition">Recettes</a>
                    <a href="/categories" class="block text-black hover:text-gold transition">Catégories</a>
                    <a href="/about" class="block text-black hover:text-gold transition">À propos</a>

                    <a href="/recipes/create"
                        class="block mt-2 bg-gold hover:bg-dark-mustard text-white py-2 px-4 rounded-lg text-center transition">
                        + Nouvelle recette
                    </a>
                </div>
            </div>

        </div>
    </header>

    {{-- LE MAIN --}}
    <main class="container mx-auto px-4 py-8 flex flex-col">
        {{ $slot }}
    </main>

    {{-- LE FOOTER --}}
    <footer class="mt-auto text-black bg-white shadow-lg">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} - <span class="text-gold">Popote</span> & Co</p>
        </div>
    </footer>

</body>

</html>
