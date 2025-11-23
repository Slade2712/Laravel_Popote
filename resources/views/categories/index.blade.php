<x-layout>
    <div class="max-w-5xl mx-auto py-10">

        <h1 class="text-4xl font-bold text-[#003049] mb-8 text-center">Toutes les catégories</h1>

        @if($categories->isEmpty())
            <p class="text-center text-gray-600">Aucune catégorie pour le moment.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->id) }}"
                       class="bg-white shadow-lg rounded-2xl p-6 flex flex-col justify-between hover:shadow-xl transition">
                        <h2 class="text-2xl font-bold text-[#003049] mb-2">{{ $category->name }}</h2>
                        <p class="text-gray-600 mt-auto">
                            Voir toutes les recettes de cette catégorie →
                        </p>
                    </a>
                @endforeach
            </div>
        @endif

    </div>
</x-layout>
