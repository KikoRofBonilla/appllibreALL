<div class="mx-auto max-w-2xl">
    <x-page-heading title="Perfil" text="Actualitza les dades bàsiques del teu compte." />
    <form wire:submit="save" class="space-y-5 rounded-xl bg-[#fdfbf0] p-6 shadow-sm ring-1 ring-[#e0d9b8]">
        <div>
            <label class="mb-1.5 block text-sm font-medium">Nom</label>
            <input type="text" wire:model="name" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">
            @error('name') <p class="mt-1 text-xs text-red-700">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="mb-1.5 block text-sm font-medium">Correu</label>
            <input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">
            @error('email') <p class="mt-1 text-xs text-red-700">{{ $message }}</p> @enderror
        </div>
        <x-button type="submit">Guardar canvis</x-button>
    </form>
</div>
