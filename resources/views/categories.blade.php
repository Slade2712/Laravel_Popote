<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Carte Catégorie 1 --}}
    <a href="{{ route('categories.show', 1) }}" class="group relative overflow-hidden rounded-2xl h-64 shadow-md cursor-pointer">
        <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Entrées">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6">
            <h3 class="text-white text-2xl font-bold group-hover:text-[#FCBF49] transition">Entrées</h3>
            <p class="text-gray-300 text-sm mt-1">Pour bien commencer</p>
        </div>
</a>
    {{-- Carte Catégorie 2 --}}
    <a href="{{ route('categories.show', 2) }}" class="group relative overflow-hidden rounded-2xl h-64 shadow-md cursor-pointer">
        <img src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Plats">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6">
            <h3 class="text-white text-2xl font-bold group-hover:text-[#FCBF49] transition">Plats de Résistance</h3>
            <p class="text-gray-300 text-sm mt-1">Le cœur du repas</p>
        </div>
</a>
    {{-- Carte Catégorie 3 --}}
    <a href="{{ route('categories.show', 3) }}" class="group relative overflow-hidden rounded-2xl h-64 shadow-md cursor-pointer">
        <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Desserts">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-6">
            <h3 class="text-white text-2xl font-bold group-hover:text-[#FCBF49] transition">Desserts</h3>
            <p class="text-gray-300 text-sm mt-1">La touche sucrée</p>
        </div>
    </a>
</div>
