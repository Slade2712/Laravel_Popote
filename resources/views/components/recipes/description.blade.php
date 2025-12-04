@props(['recipe'])

<div class="bg-[#FFFDF5] p-6 rounded-2xl shadow-md border border-[#F0E6D2]">
    <h3 class="text-lg font-bold text-[#003049] mb-3 uppercase tracking-wide text-center">À propos</h3>
    @if ($recipe->description)
        <p class="text-gray-700 italic text-center leading-relaxed">
            "{{ $recipe->description }}"
        </p>
    @else
        <p class="text-gray-400 text-center text-sm">Aucune description fournie.</p>
    @endif
</div>
