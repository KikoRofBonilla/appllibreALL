<div>
    <div class="mb-6 text-sm text-slate-500">
        <a href="{{ route('catalog') }}" class="hover:underline">Catàleg</a>
        <span class="mx-1">/</span>
        <span>{{ $book->title }}</span>
    </div>

    <section class="grid gap-8 rounded-2xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8] sm:p-8 lg:grid-cols-[280px_1fr]">
        <div>
            <img src="{{ $book->cover ? asset($book->cover) : asset('images/default-cover.svg') }}" alt="{{ $book->title }}" class="mx-auto h-96 w-full rounded-xl object-cover shadow-sm">
        </div>
        <div class="flex flex-col">
            <p class="text-xs font-semibold uppercase tracking-wide text-[#13335c]/70">{{ $book->category?->name }}</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight">{{ $book->title }}</h1>
            <p class="mt-1 text-lg text-slate-600">{{ $book->author }}</p>
            <div class="mt-5 grid gap-3 text-sm sm:grid-cols-2">
                <div><span class="font-medium">ISBN:</span> {{ $book->isbn ?: '—' }}</div>
                <div><span class="font-medium">Editorial:</span> {{ $book->publisher ?: '—' }}</div>
                <div><span class="font-medium">Pàgines:</span> {{ $book->pages ?: '—' }}</div>
                <div><span class="font-medium">Exemplars:</span> {{ $book->available_copies }} / {{ $book->total_copies }}</div>
            </div>
            <div class="mt-6">
                <h2 class="text-sm font-semibold uppercase tracking-wide">Sinopsi</h2>
                <p class="mt-2 leading-7 text-slate-700">{{ $book->synopsis ?: 'Aquest llibre encara no té sinopsi.' }}</p>
            </div>
            <div class="mt-8 flex flex-wrap gap-3">
                @auth
                    <x-button type="button" wire:click="toggleWishlist">
                        {{ $inWishlist ? 'Treure de preferits' : 'Afegir a preferits' }}
                    </x-button>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg bg-[#13335c] px-4 py-2 text-sm font-medium text-white hover:bg-[#0d2746]">Inicia sessió per guardar-lo</a>
                @endauth
                <a href="{{ route('catalog') }}" class="rounded-lg border border-[#13335c] bg-white px-4 py-2 text-sm font-medium text-[#13335c] hover:bg-[#eef2f7]">Tornar al catàleg</a>
            </div>
        </div>
    </section>
</div>
