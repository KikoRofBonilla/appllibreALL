<div class="mx-auto max-w-md">
    <section class="rounded-2xl bg-[#fdfbf0] p-6 shadow-sm ring-1 ring-[#e0d9b8] sm:p-8">
        <h1 class="text-2xl font-semibold">Nova contrasenya</h1>
        <p class="mt-1 text-sm text-slate-600">Escriu la nova contrasenya del compte.</p>
        <form wire:submit="resetPassword" class="mt-6 space-y-4">
            <div><label class="mb-1.5 block text-sm font-medium">Correu</label><input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm">@error('email')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div><label class="mb-1.5 block text-sm font-medium">Nova contrasenya</label><input type="password" wire:model="password" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm">@error('password')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div><label class="mb-1.5 block text-sm font-medium">Confirma</label><input type="password" wire:model="password_confirmation" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm"></div>
            <x-button type="submit">Canviar contrasenya</x-button>
        </form>
    </section>
</div>
