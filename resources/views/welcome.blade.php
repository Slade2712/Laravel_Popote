<x-layout>
    <div class="w-[80%] mx-auto py-10">

        {{-- Partie Principale --}}
        <div class="grid">

            <div class="space-y-6">
                <span class="badge">
                    Nouveau sur la plateforme
                </span>

                <h1 class="text-5xl md:text-6xl font-extrabold text-blue-berry">
                    Révélez le <span class="text-gold relative">
                        Chef
                        <svg class="absolute w-full h-3 bottom-0 left-0 text-gold opacity-40" viewBox="0 0 100 10"
                            preserveAspectRatio="none">
                            <path d="M0 5 Q 50 15 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                        </svg>
                    </span><br>
                    qui est en vous.
                </h1>

                <p class="text-lg text-gray-600 max-w-lg">
                    Découvrez des recettes simples, partagez vos créations culinaires et rejoignez une communauté de
                    passionnés qui ne jurent que par le "Fait Maison".
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('recipes.index') }}" class="button_explore">
                        Explorer les recettes
                    </a>
                    <a href="{{ route('recipes.create') }}" class="button_create">
                        Créer ma recette
                    </a>
                </div>
            </div>

            {{-- Carte & Image Recette tendances --}}
            <div class="relative hidden lg:block">
                {{-- Image Principale --}}
                <div
                    class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white rotate-2 hover:rotate-0 transition duration-500">
                    <img src="/img/Chapon.jpeg" alt="Plat gourmand" class="w-full h-full object-cover">
                </div>

                <div
                    class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-gray-50 flex items-center gap-3 animate-bounce-slow">
                    <div class="bg-cream p-2 rounded-full">
                        <span class="text-2xl">🔥</span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase">Recette tendances</p>
                        <p class="text-blue-berry font-bold">Chapon sauce aux morilles, flans de potiron</p>
                    </div>
                </div>
            </div>
        </div>

        {{--  LES CATÉGORIES --}}
        <div class="mb-24">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-blue-berry">Envie de quoi aujourd'hui ?</h2>
                    <p class="text-gray-500 mt-2">Parcourez nos catégories</p>
                </div>
                <a href="{{ route('recipes.index') }}"
                    class="hidden sm:inline-block text-gold font-semibold hover:underline">Voir tout &rarr;</a>
            </div>

            @include('categories')
        </div>

    </div>
</x-layout>
