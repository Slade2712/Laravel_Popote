<x-layout>
    <h1 class="text-2xl font-bold mb-4">{{ $recipe->title }}</h1>

    {{-- Image --}}
    @if($recipe->image)
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}" class="mb-4 w-full max-w-md rounded">
    @endif

    {{-- Description --}}
    @if($recipe->description)
        <p class="mb-4">{{ $recipe->description }}</p>
    @endif

    {{-- Instructions --}}
    <h2 class="text-xl font-semibold mb-2">Instructions :</h2>
    <p class="mb-4 whitespace-pre-line">{{ $recipe->instructions }}</p>

    {{-- Catégorie --}}
    @if($recipe->category)
        <p class="text-gray-700">
            Catégorie : 
            <a href="{{ route('categories.show', $recipe->category->id) }}" class="text-blue-600 hover:underline">
                {{ $recipe->category->name }}
            </a>
        </p>
    @endif

    {{-- Date --}}
    <p class="text-gray-500 text-sm mt-2">Créée le {{ $recipe->created_at->format('d/m/Y') }}</p>
</x-layout>
