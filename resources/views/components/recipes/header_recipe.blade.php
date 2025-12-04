@props(['recipe'])

<div class="mb-8 text-center bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <h1 class="text-4xl font-extrabold text-[#003049] mb-4">{{ $recipe->title }}</h1>

    <div class="flex flex-wrap justify-center items-center gap-3 text-sm">
        @if ($recipe->category)
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
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            {{ $recipe->created_at->format('d/m/Y') }}
        </span>
    </div>
</div>
