<div class="mx-auto max-w-md">
    <section class="rounded-2xl bg-[#fdfbf0] p-6 shadow-sm ring-1 ring-[#e0d9b8] sm:p-8">
        <div class="mb-6 text-center"><h1 class="text-2xl font-semibold">Crear compte</h1><p class="mt-1 text-sm text-slate-600">Forma part de la biblioteca AppLlibre.</p></div>
        <form wire:submit="register" class="space-y-4">
            <div><label class="mb-1.5 block text-sm font-medium">Nom</label><input wire:model="name" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm">@error('name')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div><label class="mb-1.5 block text-sm font-medium">Correu</label><input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm">@error('email')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div x-data="{ show: false }"><label class="mb-1.5 block text-sm font-medium">Contrasenya</label><div class="relative"><input :type="show ? 'text' : 'password'" wire:model="password" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 pr-16 text-sm"><button type="button" @click="show = !show" class="absolute right-2 top-1/2 -translate-y-1/2 text-xs font-medium text-[#13335c]" x-text="show ? 'Amaga' : 'Mostra'"></button></div>@error('password')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div><label class="mb-1.5 block text-sm font-medium">Confirma la contrasenya</label><input type="password" wire:model="password_confirmation" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm"></div>
            <x-button type="submit" class="w-full">Registrar</x-button>
        </form>
        <p class="mt-6 text-sm text-slate-600">Ja tens compte? <a href="{{ route('login') }}" class="font-medium text-[#13335c] hover:underline">Inicia sessió</a></p>
    </section>
</div>
