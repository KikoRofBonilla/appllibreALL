@props(['book'])
<article class="flex h-full flex-col overflow-hidden rounded-xl bg-[#fdfbf0] shadow-sm ring-1 ring-[#e0d9b8]">
    <a href="{{ route('books.show', $book) }}" class="block overflow-hidden bg-slate-100">
        <img src="{{ $book->cover ? asset($book->cover) : asset('images/default-cover.svg') }}" alt="{{ $book->title }}" class="h-64 w-full object-cover transition duration-200 hover:scale-[1.02] sm:h-72">
    </a>
    <div class="flex flex-1 flex-col gap-2 p-4">
        <div>
            <p class="text-xs font-medium uppercase tracking-wide text-[#13335c]/70">{{ $book->category?->name }}</p>
            <h3 class="mt-1 line-clamp-2 text-base font-semibold text-slate-900">{{ $book->title }}</h3>
            <p class="text-sm text-slate-600">{{ $book->author }}</p>
        </div>
        <p class="mt-auto text-xs {{ $book->available_copies > 0 ? 'text-emerald-700' : 'text-red-700' }}">
            {{ $book->available_copies > 0 ? $book->available_copies . ' disponibles' : 'No disponible' }}
        </p>
        <a href="{{ route('books.show', $book) }}" class="inline-flex items-center justify-center rounded-lg bg-[#13335c] px-3 py-2 text-sm font-medium text-white hover:bg-[#0d2746]">Veure detall</a>
    </div>
</article>
