@props(['label', 'name', 'type' => 'text'])
<div>
    <label for="{{ $name }}" class="mb-1.5 block text-sm font-medium text-slate-800">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" {{ $attributes->merge(['class' => 'w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none transition focus:border-[#13335c] focus:ring-2 focus:ring-[#13335c]/10']) }}>
    @error($name)
        <p class="mt-1 text-xs text-red-700">{{ $message }}</p>
    @enderror
</div>
