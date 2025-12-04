@props(['recipe'])

@foreach ($recipe->ingredients as $ingredient)
    <div class="flex items-center bg-gray-50 p-3 rounded-xl border border-gray-100 hover:shadow-sm transition">
        @php
            $imagePath = 'storage/ingredients/' . $ingredient->name . '.png';
        @endphp
        @if (file_exists(public_path($imagePath)))
            <img src="{{ asset($imagePath) }}" alt="{{ $ingredient->name }}"
                class="flex-shrink-0 h-10 w-10 rounded-full object-cover border border-gray-200">
        @else
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-sunflower/20 flex items-center justify-center text-gold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        @endif

        <div class="ml-3">
            <span class="block font-semibold text-gray-800 text-sm">{{ $ingredient->name }}</span>
            @if (!empty(trim($ingredient->pivot->quantity)))
                <span class="block text-xs text-gold font-medium">{{ $ingredient->pivot->quantity }}</span>
            @endif
        </div>
    </div>
@endforeach
