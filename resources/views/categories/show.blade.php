<x-layout>
    <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>

    <h2 class="text-xl font-semibold mt-4 mb-2">Recettes de cette catégorie :</h2>

    @if($category->recipes->isEmpty())
        <p>Aucune recette dans cette catégorie pour le moment.</p>
    @else
        <ul>
            @foreach($category->recipes as $recipe)
                <li class="mb-2">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-blue-600 hover:underline">
                        {{ $recipe->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
