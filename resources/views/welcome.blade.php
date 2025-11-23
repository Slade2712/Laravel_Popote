<x-layout>
    <div class="bg-[#EAE2B7] pt-10">

        {{-- HEADER AVEC LOGO + TITRE --}}
        <div class="flex flex-col items-center text-center mb-10">
            <img src="/img/Popote _Without_BG.svg" alt="Logo du site" class="w-24 h-24 mb-4 drop-shadow-lg">
            <h1 class="text-4xl font-bold text-black">
                Bienvenue sur <span class="text-[#D4AF37]">Notre Site de Recettes</span>
            </h1>
            <p class="text-gray-600 mt-2 max-w-xl">
                Découvrez, créez et partagez vos meilleures recettes 🍽️  
                Un espace simple, moderne et élégant pour cuisiner ensemble !
            </p>
        </div>

        {{-- SECTION ACCORDEON / PRESENTATION --}}
        <div class="mx-auto max-w-2xl bg-white rounded-2xl shadow p-6"
             x-data="{ open: false }">

            <button x-on:click="open = !open"
                class="w-full bg-[#D4AF37] hover:bg-[#c19c2f] text-white font-semibold py-3 rounded-xl transition">
                En savoir plus sur notre site
            </button>

            <div x-show="open" x-collapse class="mt-4">
                <p class="text-gray-700 leading-relaxed">
                    Ce site vous permet de consulter toutes les recettes ajoutées par les utilisateurs,
                    de créer vos propres plats, de les organiser par catégories, et de découvrir de nouvelles idées
                    chaque jour.  
                    <br><br>
                    Simple, rapide et élégant ✨
                </p>
            </div>
        </div>

        {{-- SECTION BOUTONS PRINCIPAUX --}}
        <div class="mx-auto max-w-3xl mt-12 grid grid-cols-1 sm:grid-cols-2 gap-6">
            
            <a href="/recipes"
               class="bg-white shadow-lg p-6 rounded-2xl text-center border-t-4 border-[#D4AF37] hover:shadow-xl transition">
                <h2 class="text-2xl font-bold text-black">Voir les recettes</h2>
                <p class="text-gray-600 mt-2">Parcourez toutes les recettes publiées.</p>
            </a>

            <a href="/categories"
               class="bg-white shadow-lg p-6 rounded-2xl text-center border-t-4 border-black hover:shadow-xl transition">
                <h2 class="text-2xl font-bold text-black">Voir les catégories</h2>
                <p class="text-gray-600 mt-2">Trouvez une recette par groupe culinaire.</p>
            </a>

        </div>
    </div>
</x-layout>
