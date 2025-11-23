<x-layout>
    <h1 class="text-3xl font-bold mb-8 text-center text-black">
        Toutes les <span class="text-[#D4AF37]">Recettes</span>
    </h1>

    @if($recipes->isEmpty())
        <p class="text-center text-gray-600">Aucune recette pour le moment.</p>
    @else

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($recipes as $recipe)

                <a href="{{ route('recipes.show', $recipe->id) }}"
                   class="block bg-white rounded-2xl shadow-md border-t-4 border-[#D4AF37] overflow-hidden hover:shadow-xl hover:scale-[1.02] transition">

                    {{-- IMAGE seulement si disponible --}}
                    @if(!empty($recipe->image))
                        <img src="{{ $recipe->image }}"
                             alt="Image recette"
                             class="w-full h-40 object-cover">
                    @endif

                    <div class="p-5">

                        {{-- TITRE --}}
                        <h2 class="text-xl font-semibold text-black">
                            {{ $recipe->title }}
                        </h2>

                        {{-- CATÉGORIE (affichée seulement si elle existe) --}}
                        @if($recipe->category)
                            <p class="mt-1 text-sm bg-[#EAE2B7] inline-block px-3 py-1 rounded-full">
                                {{ $recipe->category->name }}
                            </p>
                        @endif

                        {{-- DESCRIPTION --}}
                        <p class="text-gray-600 mt-3 line-clamp-3">
                            {{ $recipe->description ?? 'Aucune description disponible.' }}
                        </p>

                    </div>
                </a>

            @endforeach

        </div>

    @endif
</x-layout>
