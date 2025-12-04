@props(['recipe'])

<div class="bg-cream p-6 rounded-2xl shadow-md border border-vanilla">
    <h3 class="text-lg font-bold text-blue-berry mb-3 uppercase tracking-wide text-center">À propos</h3>
    @if ($recipe->description)
        <p class="text-gray-700 italic text-center leading-relaxed">
            "{{ $recipe->description }}"
        </p>
    @else
        <p class="text-gray-400 text-center text-sm">Aucune description fournie.</p>
    @endif
</div>
