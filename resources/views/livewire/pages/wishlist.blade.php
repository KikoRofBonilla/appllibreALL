<div>
    <x-page-heading title="Preferits" text="Els llibres que has guardat per llegir més endavant." />

    @if($books->count())
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($books as $book)
                <article wire:key="wish-{{ $book->id }}" class="flex h-full flex-col overflow-hidden rounded-xl bg-[#fdfbf0] shadow-sm ring-1 ring-[#e0d9b8]">
                    <img src="{{ $book->cover ? asset($book->cover) : asset('images/default-cover.svg') }}" alt="{{ $book->title }}" class="h-64 w-full object-cover">
                    <div class="flex flex-1 flex-col p-4">
                        <p class="text-xs font-medium uppercase tracking-wide text-[#13335c]/70">{{ $book->category?->name }}</p>
                        <h3 class="mt-1 text-lg font-semibold">{{ $book->title }}</h3>
                        <p class="text-sm text-slate-600">{{ $book->author }}</p>
                        <div class="mt-auto flex gap-2 pt-4">
                            <a href="{{ route('books.show', $book) }}" class="flex-1 rounded-lg bg-[#13335c] px-3 py-2 text-center text-sm font-medium text-white hover:bg-[#0d2746]">Veure</a>
                            <button type="button" wire:click="remove({{ $book->id }})" wire:confirm="Vols treure aquest llibre dels preferits?" class="rounded-lg border border-red-300 px-3 py-2 text-sm font-medium text-red-700 hover:bg-red-50">Treure</button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <x-empty-state title="Encara no tens preferits" text="Afegeix llibres des de la seva pàgina de detall." />
    @endif
</div>
