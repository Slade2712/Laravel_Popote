@props(['recipe'])

<div
    class="mt-8 bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
    <a href="{{ route('recipes.index') }}"
        class="px-6 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium transition flex items-center gap-2">
        <span>←</span> Retour aux recettes
    </a>

    <a href="{{ route('recipes.edit', $recipe->id) }}"
        class="px-6 py-2 rounded-lg bg-[#FCBF49] text-[#003049] font-bold hover:bg-[#f8b233] transition shadow-md hover:shadow-lg cursor-pointer flex items-center gap-2">
        <span>✏️</span> Modifier la recette
    </a>

    <form action="/recipes/{{ $recipe->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button
            class="px-6 py-2 rounded-lg bg-[#FF0000] text-[#003049] font-bold cursor-pointer flex items-center gap-2">
            <span>🗑️</span> Supprimer la recette
        </button>
    </form>
</div>
