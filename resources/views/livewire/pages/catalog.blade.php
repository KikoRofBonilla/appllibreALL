<div>
    <x-page-heading title="Catàleg" text="Busca i filtra els llibres de la biblioteca." />

    <section class="mb-7 rounded-xl bg-[#fdfbf0] p-4 shadow-sm ring-1 ring-[#e0d9b8] sm:p-5">
        <div class="grid gap-4 md:grid-cols-4">
            <div class="md:col-span-2">
                <label class="mb-1.5 block text-sm font-medium">Buscar</label>
                <input type="search" wire:model.live.debounce.400ms="search" placeholder="Títol, autor, ISBN o editorial..." class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">
                <div wire:loading wire:target="search" class="mt-1 text-xs text-slate-500">Buscant...</div>
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-medium">Categoria</label>
                <select wire:model.live="category" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">
                    <option value="">Totes</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="mb-1.5 block text-sm font-medium">Disponibilitat</label>
                <select wire:model.live="availability" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">
                    <option value="all">Tots</option>
                    <option value="available">Disponibles</option>
                    <option value="unavailable">No disponibles</option>
                </select>
            </div>
        </div>
        <div class="mt-4 flex items-center justify-between gap-3">
            <span class="text-xs text-slate-500">{{ $books->total() }} resultats</span>
            <x-button type="button" variant="secondary" wire:click="clearFilters">Netejar filtres</x-button>
        </div>
    </section>

    @if($books->count())
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($books as $book)
                <div wire:key="book-{{ $book->id }}">
                    <x-book-card :book="$book" />
                </div>
            @endforeach
        </div>
        <div class="mt-7">{{ $books->links() }}</div>
    @else
        <x-empty-state title="No s'han trobat llibres" text="Prova a canviar els criteris de cerca." />
    @endif
</div>
