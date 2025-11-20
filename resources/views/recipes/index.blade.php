<x-layout>
    <h1 class="text-2xl font-bold mb-4">Toutes les recettes</h1>

    @if($recipes->isEmpty())
        <p>Aucune recette pour le moment.</p>
    @else
        <ul>
            @foreach($recipes as $recipe)
                <li class="mb-2">
                    <a href="{{ route('recipes.show', $recipe->id) }}" class="text-blue-600 hover:underline">
                        {{ $recipe->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
