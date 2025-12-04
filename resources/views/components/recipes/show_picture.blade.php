@props(['recipe'])

<div class="bg-white rounded-2xl shadow-lg overflow-hidden h-fit">
    @if ($recipe->image)
        <div class="w-full aspect-square bg-gray-100 relative group">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
                class="w-full h-full object-cover transition transform duration-500 group-hover:scale-105">
        </div>
    @else
        <div class="w-full h-64 bg-gray-100 flex items-center justify-center text-gray-400">
            <span class="text-sm">Pas d'image disponible</span>
        </div>
    @endif
</div>
