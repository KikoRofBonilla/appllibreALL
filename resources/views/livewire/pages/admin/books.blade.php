<div>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <x-page-heading title="Administrar llibres" text="CRUD de llibres des del frontal de l'aplicació." />
        <div class="flex gap-2 text-sm">
            <a href="{{ route('admin.categories') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Categories</a>
            <a href="{{ route('admin.users') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Usuaris</a>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-[360px_1fr]">
        <section class="rounded-xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8]">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="font-semibold">{{ $editingId ? 'Editar llibre' : 'Nou llibre' }}</h2>
                @if($editingId)
                    <button wire:click="resetForm" class="text-xs text-slate-500 underline">Cancel·lar</button>
                @endif
            </div>
            <form wire:submit="save" class="space-y-4">
                <div>
                    <label class="mb-1 block text-sm font-medium">Títol</label>
                    <input wire:model="title" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">
                    @error('title')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">Autor</label>
                    <input wire:model="author" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">
                    @error('author')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">Categoria</label>
                    <select wire:model="category_id" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">
                        <option value="">Selecciona</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror
                </div>
                <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-1 2xl:grid-cols-2">
                    <div><label class="mb-1 block text-sm font-medium">ISBN</label><input wire:model="isbn" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></div>
                    <div><label class="mb-1 block text-sm font-medium">Pàgines</label><input type="number" wire:model="pages" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></div>
                    <div><label class="mb-1 block text-sm font-medium">Exemplars totals</label><input type="number" wire:model="total_copies" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></div>
                    <div><label class="mb-1 block text-sm font-medium">Disponibles</label><input type="number" wire:model="available_copies" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">@error('available_copies')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
                </div>
                <div><label class="mb-1 block text-sm font-medium">Editorial</label><input wire:model="publisher" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></div>
                <div><label class="mb-1 block text-sm font-medium">Portada (ruta dins public/)</label><input wire:model="cover" placeholder="images/1984_GeorgeOrwell.jpg" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></div>
                <div><label class="mb-1 block text-sm font-medium">Sinopsi</label><textarea wire:model="synopsis" rows="4" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></textarea></div>
                <x-button type="submit" class="w-full">{{ $editingId ? 'Guardar canvis' : 'Crear llibre' }}</x-button>
                <div wire:loading wire:target="save" class="text-xs text-slate-500">Guardant...</div>
            </form>
        </section>

        <section class="overflow-hidden rounded-xl bg-[#fdfbf0] shadow-sm ring-1 ring-[#e0d9b8]">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="border-b border-[#e0d9b8] bg-white/70 text-left">
                    <tr><th class="px-4 py-3">Llibre</th><th class="px-4 py-3">Categoria</th><th class="px-4 py-3">Stock</th><th class="px-4 py-3 text-right">Accions</th></tr>
                    </thead>
                    <tbody class="divide-y divide-[#e7e0c0]">
                    @foreach($books as $book)
                        <tr wire:key="admin-book-{{ $book->id }}">
                            <td class="px-4 py-3"><div class="font-medium">{{ $book->title }}</div><div class="text-xs text-slate-500">{{ $book->author }}</div></td>
                            <td class="px-4 py-3">{{ $book->category?->name }}</td>
                            <td class="px-4 py-3">{{ $book->available_copies }}/{{ $book->total_copies }}</td>
                            <td class="px-4 py-3 text-right"><div class="flex justify-end gap-2"><button wire:click="edit({{ $book->id }})" class="text-[#13335c] hover:underline">Editar</button><button wire:click="delete({{ $book->id }})" wire:confirm="Vols eliminar aquest llibre?" class="text-red-700 hover:underline">Esborrar</button></div></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-[#e0d9b8] p-4">{{ $books->links() }}</div>
        </section>
    </div>
</div>
