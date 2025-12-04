@props(['recipe'])

<div class="bg-white p-6 rounded-2xl shadow-lg border-t-4 border-blue-berry">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
            </path>
        </svg>
        <h2 class="text-2xl font-bold text-blue-berry">Ingrédients</h2>
    </div>
    @if ($recipe->ingredients->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-recipes.show_ingredient :recipe="$recipe" />
        </div>
    @else
        <p class="text-gray-500 italic">Aucun ingrédient listé.</p>
    @endif
</div>
