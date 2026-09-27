<div>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <x-page-heading title="Administrar categories" text="CRUD de categories de la biblioteca." />
        <div class="flex gap-2 text-sm">
            <a href="{{ route('admin.books') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Llibres</a>
            <a href="{{ route('admin.users') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Usuaris</a>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[340px_1fr]">
        <section class="rounded-xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8]">
            <div class="mb-4 flex items-center justify-between"><h2 class="font-semibold">{{ $editingId ? 'Editar categoria' : 'Nova categoria' }}</h2>@if($editingId)<button wire:click="resetForm" class="text-xs text-slate-500 underline">Cancel·lar</button>@endif</div>
            <form wire:submit="save" class="space-y-4">
                <div><label class="mb-1 block text-sm font-medium">Nom</label><input wire:model="name" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">@error('name')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
                <div><label class="mb-1 block text-sm font-medium">Descripció</label><textarea wire:model="description" rows="4" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"></textarea></div>
                <x-button type="submit">{{ $editingId ? 'Guardar' : 'Crear' }}</x-button>
            </form>
        </section>

        <section class="rounded-xl bg-[#fdfbf0] shadow-sm ring-1 ring-[#e0d9b8]">
            <div class="overflow-x-auto"><table class="min-w-full text-sm"><thead class="border-b border-[#e0d9b8] bg-white/70 text-left"><tr><th class="px-4 py-3">Categoria</th><th class="px-4 py-3">Llibres</th><th class="px-4 py-3 text-right">Accions</th></tr></thead><tbody class="divide-y divide-[#e7e0c0]">
            @foreach($categories as $category)
                <tr wire:key="category-{{ $category->id }}"><td class="px-4 py-3"><div class="font-medium">{{ $category->name }}</div><div class="text-xs text-slate-500">{{ $category->description }}</div></td><td class="px-4 py-3">{{ $category->books_count }}</td><td class="px-4 py-3 text-right"><div class="flex justify-end gap-2"><button wire:click="edit({{ $category->id }})" class="text-[#13335c] hover:underline">Editar</button><button wire:click="delete({{ $category->id }})" wire:confirm="Vols eliminar aquesta categoria?" class="text-red-700 hover:underline">Esborrar</button></div></td></tr>
            @endforeach
            </tbody></table></div>
        </section>
    </div>
</div>
