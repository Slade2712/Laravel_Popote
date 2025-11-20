<x-layout>
    <h1 class="text-2xl font-bold mb-4">Toutes les catégories</h1>

    @if($categories->isEmpty())
        <p>Aucune catégorie pour le moment.</p>
    @else
        <ul>
            @foreach($categories as $category)
                <li class="mb-2">
                    <a href="{{ route('categories.show', $category->id) }}" class="text-blue-600 hover:underline">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</x-layout>
