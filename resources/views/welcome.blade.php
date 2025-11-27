<x-layout>
    <div class="w-[80%] mx-auto py-10">

        {{-- Partie Principale --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24">
            
            <div class="space-y-6">
                <span class="px-4 py-1.5 rounded-full bg-[#FFFDF5] border border-[#D4AF37] text-[#D4AF37] text-sm font-bold tracking-wide uppercase inline-block mb-2">
                    Nouveau sur la plateforme
                </span>
                
                <h1 class="text-5xl md:text-6xl font-extrabold text-[#003049] leading-tight">
                    Révélez le <span class="text-[#D4AF37] relative">
                        Chef
                        <svg class="absolute w-full h-3 bottom-0 left-0 text-[#D4AF37] opacity-40" viewBox="0 0 100 10" preserveAspectRatio="none">
                            <path d="M0 5 Q 50 15 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                        </svg>
                    </span><br>
                    qui est en vous.
                </h1>
                
                <p class="text-lg text-gray-600 leading-relaxed max-w-lg">
                    Découvrez des recettes simples, partagez vos créations culinaires et rejoignez une communauté de passionnés qui ne jurent que par le "Fait Maison".
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('recipes.index') }}" class="px-8 py-4 rounded-xl bg-[#FCBF49] text-[#003049] font-bold text-lg hover:bg-[#f8b233] transition shadow-lg hover:shadow-xl hover:-translate-y-1 text-center">
                        Explorer les recettes
                    </a>
                    <a href="{{ route('recipes.create') }}" class="px-8 py-4 rounded-xl bg-white border-2 border-gray-100 text-gray-700 font-bold text-lg hover:border-[#D4AF37] hover:text-[#D4AF37] transition text-center">
                        Créer ma recette
                    </a>
                </div>
            </div>

            {{-- Carte & Image Recette tendances --}}
            <div class="relative hidden lg:block">                
                {{-- Image Principale --}}
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white rotate-2 hover:rotate-0 transition duration-500">
                    <img src="/img/Chapon.jpeg" 
                         alt="Plat gourmand" 
                         class="w-full h-full object-cover">
                </div>
                
                <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-gray-50 flex items-center gap-3 animate-bounce-slow">
                    <div class="bg-[#FFFDF5] p-2 rounded-full">
                        <span class="text-2xl">🔥</span>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-semibold uppercase">Recette tendances</p>
                        <p class="text-[#003049] font-bold">Chapon sauce aux morilles, flans de potiron</p>
                    </div>
                </div>
            </div>
        </div>

        {{--  LES CATÉGORIES --}}
        <div class="mb-24">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-[#003049]">Envie de quoi aujourd'hui ?</h2>
                    <p class="text-gray-500 mt-2">Parcourez nos catégories</p>
                </div>
                <a href="{{ route('recipes.index') }}" class="hidden sm:inline-block text-[#D4AF37] font-semibold hover:underline">Voir tout &rarr;</a>
            </div>

            @include('categories')
        </div>

    </div>
</x-layout>