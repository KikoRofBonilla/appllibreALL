@props(['type' => 'button', 'variant' => 'primary'])
@php
    $classes = match ($variant) {
        'secondary' => 'border border-[#13335c] bg-white text-[#13335c] hover:bg-[#eef2f7]',
        'danger' => 'bg-red-600 text-white hover:bg-red-700',
        default => 'bg-[#13335c] text-white hover:bg-[#0d2746]',
    };
@endphp
<button type="{{ $type }}" {{ $attributes->merge(['class' => "rounded-lg px-4 py-2 text-sm font-medium transition disabled:cursor-not-allowed disabled:opacity-50 $classes"]) }}>
    {{ $slot }}
</button>
