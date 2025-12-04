@props([
    'name',
    'type' => 'text',
    'label',
    'placeholder' => '',
    'required' => false,
    'textarea' => false,
    'rows' => 2,
    'default' => '',
])
<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-1">{{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    @if (!$textarea)
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
            value="{{ old($name, $default) }}" placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">
    @else
        <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
            rows="{{ $rows }}" @if ($required) required @endif
            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:bg-white focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition duration-200 outline-none text-gray-800 placeholder-gray-400">{{ old($name, $default) }}</textarea>
    @endif
</div>
