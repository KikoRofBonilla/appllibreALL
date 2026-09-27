@props(['type' => 'info', 'message'])
@php
    $classes = match ($type) {
        'success' => 'border-emerald-300 bg-emerald-50 text-emerald-900',
        'error' => 'border-red-300 bg-red-50 text-red-900',
        default => 'border-sky-300 bg-sky-50 text-sky-900',
    };
@endphp
<div class="mb-6 rounded-lg border px-4 py-3 text-sm {{ $classes }}">
    {{ $message }}
</div>
