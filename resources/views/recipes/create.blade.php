<x-layout>
    <h1 class="text-2xl font-bold mb-4">Créer une nouvelle recette</h1>

    <form action="{{ route('recipes.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Titre --}}
        <div>
            <label for="title" class="block font-medium">Titre</label>
            <input type="text" name="title" id="title" class="border rounded w-full px-3 py-2" required>
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="border rounded w-full px-3 py-2"></textarea>
        </div>

        {{-- Instructions --}}
        <div>
            <label for="instructions" class="block font-medium">Instructions</label>
            <textarea name="instructions" id="instructions" class="border rounded w-full px-3 py-2" required></textarea>
        </div>

        {{-- Catégorie --}}
        <div>
            <label for="category_id" class="block font-medium">Catégorie</label>
            <select name="category_id" id="category_id" class="border rounded w-full px-3 py-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Bouton --}}
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Créer la recette
            </button>
        </div>
    </form>
</x-layout>
