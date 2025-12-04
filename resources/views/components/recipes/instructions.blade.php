@props(['recipe'])

<div class="bg-white p-8 rounded-2xl shadow-lg border-t-4 border-gold flex-grow">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
            </path>
        </svg>
        <h2 class="text-2xl font-bold text-blue-berry">Instructions</h2>
    </div>

    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
        {!! nl2br(e($recipe->instructions)) !!}
    </div>
</div>
