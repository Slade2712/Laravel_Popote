<x-layout>
    <div class="w-[80%] mx-auto py-10">
        {{-- 1. HEADER (Titre + Catégorie + Date) --}}
        <div class="mb-8 text-center bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <h1 class="text-4xl font-extrabold text-[#003049] mb-4">{{ $recipe->title }}</h1>

            <div class="flex flex-wrap justify-center items-center gap-3 text-sm">
                @if($recipe->category)
                    <a href="{{ route('categories.show', $recipe->category->id) }}"
                       class="inline-block bg-[#D4AF37] hover:bg-[#c19c2f] text-white py-1 px-4 rounded-full transition font-medium">
                        {{ $recipe->category->name }}
                    </a>
                @else
                    <span class="inline-block bg-gray-200 text-gray-700 py-1 px-4 rounded-full">
                        Sans catégorie
                    </span>
                @endif

                <span class="text-gray-500 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $recipe->created_at->format('d/m/Y') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="flex flex-col gap-8">

                {{-- INGRÉDIENTS --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg border-t-4 border-[#003049]">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <h2 class="text-2xl font-bold text-[#003049]">Ingrédients</h2>
                    </div>

                    @if($recipe->ingredients->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($recipe->ingredients as $ingredient)
                                <div class="flex items-center bg-gray-50 p-3 rounded-xl border border-gray-100 hover:shadow-sm transition">
                                    {{-- Image Ingrédient --}}
                                    @php
                                        $imagePath = 'storage/ingredients/' . $ingredient->name . '.png';
                                    @endphp
                                    @if(file_exists(public_path($imagePath)))
                                        <img src="{{ asset($imagePath) }}" alt="{{ $ingredient->name }}" class="flex-shrink-0 h-10 w-10 rounded-full object-cover border border-gray-200">
                                    @else
                                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-[#FCBF49]/20 flex items-center justify-center text-[#D4AF37]">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    @endif
                                    
                                    <div class="ml-3">
                                        <span class="block font-semibold text-gray-800 text-sm">{{ $ingredient->name }}</span>
                                        @if(!empty(trim($ingredient->pivot->quantity)))
                                            <span class="block text-xs text-[#D4AF37] font-medium">{{ $ingredient->pivot->quantity }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">Aucun ingrédient listé.</p>
                    @endif
                </div>

                {{-- INSTRUCTIONS --}}
                <div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-[#D4AF37] flex-grow">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <h2 class="text-2xl font-bold text-[#003049]">Instructions</h2>
                    </div>
                    
                    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
                        {!! nl2br(e($recipe->instructions)) !!}
                    </div>
                </div>

            </div>

            <div class="flex flex-col gap-8">
                {{-- PHOTO --}}
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-fit">
                    @if($recipe->image)
                        <div class="w-full aspect-square bg-gray-100 relative group">
                            <img
                                src="{{ asset('storage/' . $recipe->image) }}"
                                alt="{{ $recipe->title }}"
                                class="w-full h-full object-cover transition transform duration-500 group-hover:scale-105">
                        </div>
                    @else
                        <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-400">
                            <span class="text-sm">Pas d'image disponible</span>
                        </div>
                    @endif
                </div>

                {{-- DESCRIPTION --}}
                <div class="bg-[#FFFDF5] p-6 rounded-2xl shadow-md border border-[#F0E6D2]">
                    <h3 class="text-lg font-bold text-[#003049] mb-3 uppercase tracking-wide text-center">À propos</h3>
                    @if($recipe->description)
                        <p class="text-gray-700 italic text-center leading-relaxed">
                            "{{ $recipe->description }}"
                        </p>
                    @else
                        <p class="text-gray-400 text-center text-sm">Aucune description fournie.</p>
                    @endif
                </div>

            </div>
        </div>

        {{-- FOOTER DE LA SECTION --}}
        <div class="mt-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
            <a href="{{ route('recipes.index') }}"
               class="px-6 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition flex items-center gap-2">
                <span>←</span> Retour aux recettes
            </a>

            <button class="px-6 py-2 rounded-lg bg-[#FCBF49] text-[#003049] font-bold hover:bg-[#f8b233] transition shadow-md hover:shadow-lg cursor-pointer flex items-center gap-2">
                <span>✏️</span> Modifier la recette
            </button>

            <form action="/recipes/{{ $recipe->id }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="px-6 py-2 rounded-lg bg-[#FF0000] text-[#003049] font-bold cursor-pointer flex items-center gap-2">
                    <span>🗑️</span> Supprimer la recette
                </button>
            </form>
        </div>

    </div>
</x-layout>