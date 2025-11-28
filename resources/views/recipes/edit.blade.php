<x-layout>
    <div class="max-w-5xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12">
            <span class="inline-block py-1 px-3 rounded-full bg-[#FFFDF5] border border-[#D4AF37] text-[#D4AF37] text-xs font-bold tracking-wider uppercase mb-4">
                Espace Modificateur
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-[#003049] tracking-tight mb-4">
                Modifier votre <br class="hidden sm:block" />
                <span class="text-[#D4AF37] relative whitespace-nowrap">
                    Recette Secrète
                    <svg class="absolute w-full h-3 -bottom-1 left-0 text-[#D4AF37] opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none">
                        <path d="M0 5 Q 50 15 100 5" stroke="currentColor" stroke-width="3" fill="none" />
                    </svg>
                </span>
            </h1>

            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Transformez vos ingrédients en souvenirs. Remplissez le formulaire ci-dessous pour modifier votre plat.
            </p>
        </div>

        <form action="/recipes/{{ $recipe->id }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-xl overflow-hidden">
            @csrf
            @method("PUT")
            
            <div class="grid grid-cols-1 lg:grid-cols-3">
                
                <div class="p-8 lg:col-span-2 space-y-6">
                   {{--  Titre, Description, Catégorie, Instructions --}}
                   <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Titre de la recette</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description courte</label>
                        <textarea id="description" name="description" rows="2" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">{{ old('description', $recipe->description) }}</textarea>
                    </div>
                    <div>
                         <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1">Catégorie</label>
                         <div class="relative">
                            <select id="category_id" name="category_id" required class="w-full pl-4 pr-10 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none appearance-none text-gray-800">
                                <option value="">-- Choisir une catégorie --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $recipe->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                         </div>
                    </div>
                    <div>
                        <label for="instructions" class="block text-sm font-semibold text-gray-700 mb-1">Instructions détaillées</label>
                        <textarea id="instructions" name="instructions" rows="8" required class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">{{ old('instructions', $recipe->instructions) }}</textarea>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 lg:border-l border-gray-100 space-y-8">
                    
                    {{-- Upload Image  --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Photo du plat</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:bg-gray-100 hover:border-[#D4AF37] transition group cursor-pointer relative bg-white">
                            <input type="file" id="image" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="space-y-1 text-center">
                                @if($recipe->image)
                                    <div class="text-xs text-green-600 font-bold mb-2">Image actuelle présente</div>
                                @endif
                                <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-[#D4AF37] transition" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <span class="relative cursor-pointer bg-transparent rounded-md font-medium text-[#D4AF37] group-hover:text-[#b08d2b]">
                                        {{ $recipe->image ? 'Changer l\'image' : 'Télécharger une image' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SECTION INGRÉDIENTS --}}
                    {{-- Modification ici : On passe les ingrédients existants de la recette --}}
                    <div x-data="gestionnaireIngredients({{ json_encode($ingredients) }}, {{ json_encode($recipe->ingredients) }})" class="space-y-4">
                        
                        <label class="block text-sm font-semibold text-gray-700">Ingrédients</label>

                        {{-- Zone de Recherche --}}
                        <div class="relative" @click.outside="afficherResultats = false">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            
                            <input type="text" 
                                   x-model="termeRecherche"
                                   @focus="afficherResultats = true"
                                   @input="afficherResultats = true"
                                   placeholder="Rechercher (ex: Farine, Oeufs...)" 
                                   class="pl-10 block w-full border-gray-200 rounded-lg shadow-sm focus:ring-[#D4AF37] focus:border-[#D4AF37] sm:text-sm py-2.5 bg-gray-50 transition-colors"
                                   autocomplete="off">
                            
                            {{-- Dropdown des résultats --}}
                            <div x-show="afficherResultats && termeRecherche.length > 0" 
                                 x-transition.opacity.duration.200ms
                                 class="absolute z-50 mt-1 w-full bg-white shadow-xl max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
                                 style="display: none;">
                                
                                <template x-for="ingredient in ingredientsFiltres" :key="ingredient.id">
                                    <div @click="ajouterIngredient(ingredient)" 
                                         class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-[#EAE2B7]/30 text-gray-900 transition-colors flex items-center">
                                        
                                        <img :src="getUrlImage(ingredient.name)" 
                                             class="h-8 w-8 rounded-full object-cover mr-3 border border-gray-200" 
                                             alt="">
                                        
                                        <span x-text="ingredient.name"></span>
                                    </div>
                                </template>
                                
                                <div x-show="ingredientsFiltres.length === 0" class="text-gray-500 py-2 pl-3 italic text-sm">
                                    Aucun ingrédient trouvé...
                                </div>
                            </div>
                        </div>

                        {{-- Liste des Ingrédients Sélectionnés --}}
                        <div class="space-y-3">
                            <div x-show="ingredientsAjoutes.length === 0" 
                                 class="text-sm text-gray-500 text-center italic py-4 bg-gray-50 rounded-lg border border-dashed border-gray-200">
                                Aucun ingrédient ajouté pour le moment.
                            </div>

                            <template x-for="(ing, index) in ingredientsAjoutes" :key="ing.id">
                                <div class="flex items-center gap-3 bg-white p-3 rounded-lg border border-gray-200 shadow-sm transition-all hover:border-[#D4AF37]/50 group">
                                    
                                    <input type="hidden" name="ingredients[]" :value="ing.id">
                                    
                                    <img :src="getUrlImage(ing.name)" 
                                         class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                                         alt="">
                                    
                                    <div class="flex-1 font-medium text-gray-800" x-text="ing.name"></div>

                                    <div class="w-1/3">
                                        <input type="text" 
                                               :name="'quantities[' + ing.id + ']'" 
                                               x-model="ing.quantity"
                                               placeholder="Qté" 
                                               required
                                               class="quantity-input w-full text-sm border-gray-200 rounded-md focus:ring-[#D4AF37] focus:border-[#D4AF37] bg-gray-50 focus:bg-white transition-colors py-1.5">
                                    </div>

                                    <button type="button" @click="supprimerIngredient(index)" class="text-gray-400 hover:text-red-500 transition-colors p-1 rounded-full hover:bg-red-50">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer de la séction --}}
            <div class="bg-gray-50 px-8 py-5 border-t border-gray-100 flex items-center justify-between">
                <a href="{{ route('recipes.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">&larr; Retour aux recettes</a>
                <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-[#D4AF37] hover:bg-[#b08d2b] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#D4AF37] transition-all transform hover:scale-[1.02]">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Mettre à jour ma recette
                </button>
            </div>
        </form>
    </div>

<script>
    document.addEventListener('alpine:init', () => {
        // Modification JS : On accepte le 2eme argument (les ingrédients de la recette)
        Alpine.data('gestionnaireIngredients', (tousLesIngredientsDisponibles, ingredientsDeLaRecette = []) => ({
            
            termeRecherche: '',
            afficherResultats: false,
            // Modification JS : On map les ingrédients existants avec leur quantité (pivot)
            ingredientsAjoutes: ingredientsDeLaRecette.map(ing => ({
                id: ing.id,
                name: ing.name,
                // Récupération de la quantité depuis la table pivot
                quantity: ing.pivot ? ing.pivot.quantity : ''
            })),
            baseIngredients: tousLesIngredientsDisponibles,
            
            get ingredientsFiltres() {
                if (this.termeRecherche === '') return [];
                
                return this.baseIngredients.filter(ingredient => {
                    const correspondRecherche = ingredient.name.toLowerCase().includes(this.termeRecherche.toLowerCase());
                    const pasEncoreAjoute = !this.ingredientsAjoutes.some(item => item.id === ingredient.id);
                    return correspondRecherche && pasEncoreAjoute;
                });
            },

            getUrlImage(nomIngredient) {
                return '/storage/ingredients/' + nomIngredient + '.png';
            },

            ajouterIngredient(ingredientCible) {
                this.ingredientsAjoutes.push({
                    id: ingredientCible.id,
                    name: ingredientCible.name,
                    quantity: ''
                });
                
                this.termeRecherche = '';
                this.afficherResultats = false;
                
                this.$nextTick(() => {
                    const champsQuantite = document.querySelectorAll('.quantity-input');
                    if(champsQuantite.length) champsQuantite[champsQuantite.length - 1].focus();
                });
            },

            supprimerIngredient(indexIngredient) {
                this.ingredientsAjoutes.splice(indexIngredient, 1);
            }
        }));
    });
</script>
</x-layout>