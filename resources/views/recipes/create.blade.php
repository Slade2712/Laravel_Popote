<x-layout>
    <div class="w-8/12 mx-auto py-10"> {{-- Limité à environ 70% --}}
        <h1 class="text-4xl font-bold mb-8 text-center text-black">Créer une nouvelle recette</h1>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white rounded-2xl shadow-lg p-8">
            @csrf

            {{-- Titre --}}
            <div>
                <label for="title" class="block text-lg font-semibold mb-1">Titre :</label>
                <input type="text" name="title" id="title"
                       class="border border-gray-300 rounded-xl w-full px-4 py-3 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none"
                       required>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-lg font-semibold mb-1">Description :</label>
                <textarea name="description" id="description"
                          class="border border-gray-300 rounded-xl w-full px-4 py-3 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none"
                          rows="3"></textarea>
            </div>

            {{-- Instructions --}}
            <div>
                <label for="instructions" class="block text-lg font-semibold mb-1">Instructions :</label>
                <textarea name="instructions" id="instructions"
                          class="border border-gray-300 rounded-xl w-full px-4 py-3 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none"
                          rows="6" required></textarea>
            </div>

            {{-- Catégorie --}}
            <div>
                <label for="category_id" class="block text-lg font-semibold mb-1">Catégorie :</label>
                <select name="category_id" id="category_id"
                        class="border border-gray-300 rounded-xl w-full px-4 py-3 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none"
                        required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-lg font-semibold mb-1">Image (optionnelle) :</label>
                <input type="file" name="image" id="image"
                       class="border border-gray-300 rounded-xl w-full px-4 py-3 focus:ring-2 focus:ring-[#D4AF37] focus:outline-none"
                       accept="image/*">
            </div>

            {{-- Bouton --}}
            <div class="text-center">
                <button type="submit"
                        class="bg-[#D4AF37] hover:bg-[#c19c2f] text-black font-semibold px-6 py-3 rounded-xl transition">
                    Créer la recette
                </button>
            </div>
        </form>
    </div>
</x-layout>
