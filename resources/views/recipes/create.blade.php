<x-layout>
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        {{-- En-tête --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                Créer une nouvelle <span class="text-[#D4AF37] relative">
                    Recette
                    <svg class="absolute w-full h-2 bottom-0 left-0 text-[#D4AF37] opacity-40" viewBox="0 0 100 10" preserveAspectRatio="none">
                        <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                    </svg>
                </span>
            </h1>
            <p class="mt-2 text-lg text-gray-600">Partagez votre savoir-faire culinaire avec la communauté.</p>
        </div>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Des erreurs sont présentes</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-xl overflow-hidden">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-3">
                
                {{-- COLONNE GAUCHE : Informations Principales --}}
                <div class="p-8 lg:col-span-2 space-y-6">
                    
                    {{-- Titre --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Titre de la recette</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Ex: Bœuf Bourguignon Traditionnel"
                               class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">
                    </div>

                    {{-- Description --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description courte</label>
                        <textarea id="description" name="description" rows="2" placeholder="Une brève introduction pour donner l'eau à la bouche..."
                                  class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">{{ old('description') }}</textarea>
                    </div>

                    {{-- Catégorie --}}
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Catégorie</label>
                        <div class="relative">
                            <select id="category_id" name="category_id" required
                                    class="w-full pl-4 pr-10 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none appearance-none text-gray-800">
                                <option value="">-- Choisir une catégorie --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Instructions --}}
                    <div>
                        <label for="instructions" class="block text-sm font-semibold text-gray-700 mb-1">Instructions détaillées</label>
                        <textarea id="instructions" name="instructions" rows="8" required placeholder="Détaillez les étapes de préparation..."
                                  class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">{{ old('instructions') }}</textarea>
                    </div>
                </div>

                {{-- COLONNE DROITE : Visuel & Ingrédients --}}
                <div class="bg-gray-50 p-8 lg:border-l border-gray-100 space-y-8">
                    
                    {{-- Upload Image (Style Dropzone) --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Photo du plat</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-100 hover:border-[#D4AF37] transition group cursor-pointer relative bg-white">
                            <input type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-[#D4AF37] transition" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <span class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#D4AF37] group-hover:text-[#b08d2b]">
                                        Télécharger une image
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG jusqu'à 2MB</p>
                            </div>
                        </div>
                    </div>

                    {{-- Ingrédients --}}
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="block text-sm font-semibold text-gray-700">Ingrédients</label>
                            <span class="text-xs text-gray-500 bg-white px-2 py-1 rounded border">Cochez pour ajouter</span>
                        </div>
                        
                        <div class="bg-white border border-gray-200 rounded-xl max-h-[400px] overflow-y-auto custom-scrollbar p-2 space-y-2 shadow-inner">
                            @forelse ($ingredients as $ingredient)
                                <div class="relative flex items-center p-2 rounded-lg hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100 group">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" id="ing_{{ $ingredient->id }}"
                                               {{ in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '' }}
                                               class="h-5 w-5 rounded border-gray-300 text-[#D4AF37] focus:ring-[#D4AF37] cursor-pointer peer">
                                    </div>
                                    <div class="ml-3 flex-1 flex items-center justify-between">
                                        <label for="ing_{{ $ingredient->id }}" class="text-sm font-medium text-gray-700 cursor-pointer peer-checked:text-[#D4AF37] select-none">
                                            {{ $ingredient->name }}
                                        </label>
                                        
                                        {{-- Champ Quantité (visible uniquement au focus ou survol pour le style, ou toujours visible mais discret) --}}
                                        <input type="text" name="quantities[{{ $ingredient->id }}]" 
                                               value="{{ old('quantities.' . $ingredient->id) }}" 
                                               placeholder="Qté (ex: 200g)" 
                                               class="w-28 text-xs border-gray-200 rounded-md focus:ring-1 focus:ring-[#D4AF37] focus:border-[#D4AF37] placeholder-gray-300">
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8 text-gray-400 text-sm">
                                    Aucun ingrédient dans la base.
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            {{-- Footer / Boutons --}}
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-100 flex items-center justify-between">
                <a href="{{ route('recipes.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">
                    &larr; Retour aux recettes
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-[#D4AF37] hover:bg-[#b08d2b] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37] transition-all transform hover:scale-[1.02]">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Enregistrer ma recette
                </button>
            </div>
        </form>
    </div>
</x-layout>