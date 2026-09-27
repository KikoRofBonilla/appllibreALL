<div>
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <x-page-heading title="Administrar usuaris" text="CRUD d'usuaris i rols." />
        <div class="flex gap-2 text-sm"><a href="{{ route('admin.books') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Llibres</a><a href="{{ route('admin.categories') }}" class="rounded-lg border border-[#13335c] bg-white px-3 py-2 text-[#13335c]">Categories</a></div>
    </div>

    <div class="grid gap-6 lg:grid-cols-[340px_1fr]">
        <section class="rounded-xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8]">
            <div class="mb-4 flex items-center justify-between"><h2 class="font-semibold">{{ $editingId ? 'Editar usuari' : 'Nou usuari' }}</h2>@if($editingId)<button wire:click="resetForm" class="text-xs text-slate-500 underline">Cancel·lar</button>@endif</div>
            <form wire:submit="save" class="space-y-4">
                <div><label class="mb-1 block text-sm font-medium">Nom</label><input wire:model="name" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">@error('name')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
                <div><label class="mb-1 block text-sm font-medium">Correu</label><input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">@error('email')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
                <div><label class="mb-1 block text-sm font-medium">Rol</label><select wire:model="role" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm"><option value="user">Usuari</option><option value="admin">Administrador</option></select></div>
                <div><label class="mb-1 block text-sm font-medium">Contrasenya {{ $editingId ? '(opcional)' : '' }}</label><input type="password" wire:model="password" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2 text-sm">@error('password')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
                <x-button type="submit">{{ $editingId ? 'Guardar' : 'Crear' }}</x-button>
            </form>
        </section>

        <section class="rounded-xl bg-[#fdfbf0] shadow-sm ring-1 ring-[#e0d9b8]"><div class="overflow-x-auto"><table class="min-w-full text-sm"><thead class="border-b border-[#e0d9b8] bg-white/70 text-left"><tr><th class="px-4 py-3">Usuari</th><th class="px-4 py-3">Rol</th><th class="px-4 py-3 text-right">Accions</th></tr></thead><tbody class="divide-y divide-[#e7e0c0]">
        @foreach($users as $user)
            <tr wire:key="user-{{ $user->id }}"><td class="px-4 py-3"><div class="font-medium">{{ $user->name }}</div><div class="text-xs text-slate-500">{{ $user->email }}</div></td><td class="px-4 py-3"><span class="rounded-full bg-slate-100 px-2 py-1 text-xs">{{ $user->role }}</span></td><td class="px-4 py-3 text-right"><div class="flex justify-end gap-2"><button wire:click="edit({{ $user->id }})" class="text-[#13335c] hover:underline">Editar</button><button wire:click="delete({{ $user->id }})" wire:confirm="Vols eliminar aquest usuari?" class="text-red-700 hover:underline">Esborrar</button></div></td></tr>
        @endforeach
        </tbody></table></div></section>
    </div>
</div>
