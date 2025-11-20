@props([
    'active' => false,
])
<li>
    <a 
        {{ $attributes->class([
            'btn',
            'btn-primary' => $active
        ]) }}
    >
        {{ $slot }}
    </a>
</li>
