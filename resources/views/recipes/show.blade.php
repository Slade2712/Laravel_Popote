<x-layout>
    <div class="max-w-4xl mx-auto py-10">

        {{-- CARTE PRINCIPALE --}}
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

            {{-- IMAGE --}}
            @if($recipe->image)
                <div class="w-full h-72 bg-gray-100 overflow-hidden">
                    <img 
                        src="{{ asset('storage/' . $recipe->image) }}" 
                        alt="{{ $recipe->title }}" 
                        class="w-full h-full object-cover"
                    >
                </div>
            @endif

            {{-- CONTENU --}}
            <div class="p-8">

                {{-- TITRE + CATEGORIE + DATE --}}
                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 mb-4">
                    <h1 class="text-4xl font-bold text-[#003049]">{{ $recipe->title }}</h1>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-sm">
                        @if($recipe->category)
                            <a href="{{ route('categories.show', $recipe->category->id) }}"
                               class="inline-block bg-[#D4AF37] hover:bg-[#c19c2f] text-white py-1 px-4 rounded-full transition">
                                {{ $recipe->category->name }}
                            </a>
                        @else
                            <span class="inline-block bg-gray-300 text-gray-700 py-1 px-4 rounded-full">
                                Sans catégorie
                            </span>
                        @endif

                        <span class="text-gray-500">
                            Ajoutée le {{ $recipe->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                @if($recipe->description)
                    <p class="text-gray-700 leading-relaxed mb-6">{{ $recipe->description }}</p>
                @endif

                {{-- SEPARATEUR --}}
                <hr class="border-gray-300 my-6">

                {{-- INSTRUCTIONS --}}
                <h2 class="text-2xl font-semibold text-[#003049] mb-3">Instructions</h2>
                <div class="prose max-w-none text-gray-800 whitespace-pre-line">
                    {{ $recipe->instructions }}
                </div>

                {{-- BOUTONS --}}
                <div class="flex flex-col sm:flex-row justify-between items-center mt-10 gap-4">

                    {{-- Retour --}}
                    <a 
                        href="{{ route('recipes.index') }}"
                        class="px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium transition w-full sm:w-auto text-center"
                    >
                        ← Retour aux recettes
                    </a>

                    {{-- Modifier --}}
                    <a 
                        {{-- href="{{ route('recipes.edit', $recipe->id) }}" --}}
                        class="px-5 py-2 rounded-lg bg-[#FCBF49] text-[#003049] font-medium hover:bg-[#f8b233] transition w-full sm:w-auto text-center"
                    >
                        ✏️ Modifier la recette
                    </a>

                </div>

            </div>
        </div>

    </div>
</x-layout>
