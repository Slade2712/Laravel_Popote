<x-layout>
    <div class="w-[80%] mx-auto py-12">

        {{-- Titre de la page --}}
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-berry tracking-tight mb-6">
                Bienvenue dans notre <span class="text-gold relative inline-block">
                    Cuisine
                    <svg class="absolute w-full h-3 bottom-1 left-0 text-gold opacity-30" viewBox="0 0 100 10"
                        preserveAspectRatio="none">
                        <path d="M0 5 Q 50 15 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                    </svg>
                </span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Plus qu'un simple livre de recettes, nous sommes une communauté de passionnés qui croient que le bonheur
                se partage autour d'une table.
            </p>
        </div>

        {{-- Section "Notre Mission" --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">

            {{-- Image d'illustration --}}
            <img src="/img/Popote_Without_BG.svg" alt="LOGO POPOTE">

            {{-- Texte --}}
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-blue-berry">Notre Mission</h2>
                <div class="w-20 h-1.5 bg-gold rounded-full"></div>

                <p class="text-gray-700 leading-relaxed text-lg">
                    Tout a commencé avec une idée simple : **pourquoi garder ses meilleures recettes secrètes ?**
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Nous avons créé cette plateforme pour permettre à chacun, du débutant curieux au chef expérimenté,
                    de trouver l'inspiration. Que vous cherchiez à vider votre frigo avec créativité ou à impressionner
                    vos invités, vous êtes au bon endroit.
                </p>
                <p class="text-gray-700 leading-relaxed">
                    Ici, nous célébrons les produits frais, les épices du monde et surtout, le plaisir de faire
                    soi-même.
                </p>

                {{-- Chiffres clés --}}
                <div class="grid grid-cols-3 gap-4 pt-4 border-t border-gray-100">
                    <div>
                        <span class="block text-2xl font-bold text-gold">{{ $recipesCount ?? '50+' }}</span>
                        <span class="text-sm text-gray-500">Recettes</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-gold">{{ $ingredientsCount ?? '100+' }}</span>
                        <span class="text-sm text-gray-500">Ingrédients</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-gold">100%</span>
                        <span class="text-sm text-gray-500">Passion</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card de nos valeurs --}}
        <div class="mb-20">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-blue-berry mb-4">Pourquoi nous choisir ?</h2>
                <p class="text-gray-600">Nos piliers pour une cuisine réussie.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- Carte 1 --}}
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:border-gold/50 transition duration-300 text-center group">
                    <div
                        class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-berry mb-3">Simplicité</h3>
                    <p class="text-gray-600">Des recettes claires, des instructions étape par étape et des ingrédients
                        faciles à trouver.</p>
                </div>

                {{-- Carte 2 --}}
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:border-gold/50 transition duration-300 text-center group">
                    <div
                        class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-berry mb-3">Partage</h3>
                    <p class="text-gray-600">Une communauté bienveillante où chacun apporte son grain de sel et ses
                        astuces de chef.</p>
                </div>

                {{-- Carte 3 --}}
                <div
                    class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:border-gold/50 transition duration-300 text-center group">
                    <div
                        class="w-16 h-16 bg-cream rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-blue-berry mb-3">Inspiration</h3>
                    <p class="text-gray-600">Fini la panne d'inspiration devant le frigo. Découvrez de nouvelles saveurs
                        chaque jour.</p>
                </div>

            </div>
        </div>

        {{-- Passer au fourneau (commencer a crée) --}}
        <div class="bg-blue-berry rounded-3xl p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full opacity-10">
                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
                </svg>
            </div>

            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Prêt à passer aux fourneaux ?</h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto text-lg">
                    Rejoignez-nous et commencez à créer, partager et déguster vos meilleures recettes dès aujourd'hui.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('recipes.create') }}"
                        class="px-8 py-3 rounded-full bg-sunflower text-blue-berry font-bold text-lg hover:bg-mustard transition transform hover:scale-105 shadow-lg">
                        Créer une recette
                    </a>
                    <a href="{{ route('recipes.index') }}"
                        class="px-8 py-3 rounded-full bg-transparent border-2 border-gold text-gold font-bold text-lg hover:bg-gold hover:text-white transition">
                        Explorer les plats
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-layout>
