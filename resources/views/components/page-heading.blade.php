@props(['title', 'text' => null])
<div class="mb-6">
    <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-3xl">{{ $title }}</h1>
    @if($text)
        <p class="mt-1 max-w-2xl text-sm text-slate-600">{{ $text }}</p>
    @endif
</div>
