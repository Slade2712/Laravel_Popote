<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/img/Popote _Without_BG.svg">
    <title>{{ $title ?? 'Popote' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" style="background-color: #EAE2B7;">

    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            {{-- LOGO --}}
            <a href="/" class="flex items-center space-x-3">
                <img src="/img/Popote _Without_BG.svg" alt="Logo" class="w-12 h-12">
                <span class="text-2xl font-bold text-black">
                    <span class="text-[#D4AF37]">Popote</span> & Co
                </span>
            </a>

            {{-- NAVIGATION --}}
            <nav class="hidden md:flex space-x-8 text-lg font-medium">
                <a href="/" class="text-black hover:text-[#D4AF37] transition">Accueil</a>
                <a href="/recipes" class="text-black hover:text-[#D4AF37] transition">Recettes</a>
                <a href="/categories" class="text-black hover:text-[#D4AF37] transition">Catégories</a>
                <a href="/about" class="text-black hover:text-[#D4AF37] transition">À propos</a>
            </nav>

            {{-- BOUTON ACTION --}}
            <a href="/recipes/create"
            class="hidden md:block bg-[#D4AF37] hover:bg-[#c19c2f] text-white font-semibold py-2 px-5 rounded-xl shadow transition">
                + Nouvelle recette
            </a>

            {{-- MENU MOBILE --}}
            <div class="md:hidden" x-data="{ open: false }">
                <button @click="open = !open" class="text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div x-show="open" x-collapse
                    class="absolute right-4 mt-3 bg-white shadow-lg rounded-xl py-3 px-6 space-y-3 text-lg font-medium">

                    <a href="/" class="block text-black hover:text-[#D4AF37] transition">Accueil</a>
                    <a href="/recipes" class="block text-black hover:text-[#D4AF37] transition">Recettes</a>
                    <a href="/categories" class="block text-black hover:text-[#D4AF37] transition">Catégories</a>
                    <a href="/about" class="block text-black hover:text-[#D4AF37] transition">À propos</a>

                    <a href="/recipes/create"
                    class="block mt-2 bg-[#D4AF37] hover:bg-[#c19c2f] text-white py-2 px-4 rounded-lg text-center transition">
                        + Nouvelle recette
                    </a>
                </div>
            </div>

        </div>
    </header>




    <!-- Main content -->
    <main class="container mx-auto px-4 py-8 flex flex-col">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="mt-auto text-black bg-white shadow-lg">
        <div class="container mx-auto px-4 py-6 text-center">
            <p>&copy; {{ date('Y') }} - Popote & Co</p>
        </div>
    </footer>

</body>
</html>
