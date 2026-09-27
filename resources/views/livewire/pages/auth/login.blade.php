<div class="mx-auto max-w-md">
    <section class="rounded-2xl bg-[#fdfbf0] p-6 shadow-sm ring-1 ring-[#e0d9b8] sm:p-8">
        <div class="mb-6 text-center"><div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full border-2 border-[#13335c] text-xl">👤</div><h1 class="text-2xl font-semibold">Iniciar sessió</h1><p class="mt-1 text-sm text-slate-600">Accedeix al catàleg i als teus preferits.</p></div>
        <form wire:submit="login" class="space-y-5">
            <div><label class="mb-1.5 block text-sm font-medium">Correu electrònic</label><input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm outline-none focus:border-[#13335c]">@error('email')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <div x-data="{ show: false }"><label class="mb-1.5 block text-sm font-medium">Contrasenya</label><div class="relative"><input :type="show ? 'text' : 'password'" wire:model="password" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 pr-16 text-sm outline-none focus:border-[#13335c]"><button type="button" @click="show = !show" class="absolute right-2 top-1/2 -translate-y-1/2 text-xs font-medium text-[#13335c]" x-text="show ? 'Amaga' : 'Mostra'"></button></div>@error('password')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" wire:model="remember" class="rounded border-[#cfc7a6]"> Recorda'm</label>
            <x-button type="submit" class="w-full">Entrar</x-button>
            <div wire:loading wire:target="login" class="text-center text-xs text-slate-500">Entrant...</div>
        </form>
        <div class="mt-6 flex flex-col gap-2 text-sm"><a href="{{ route('password.request') }}" class="text-[#13335c] hover:underline">Has oblidat la contrasenya?</a><a href="{{ route('register') }}" class="text-[#13335c] hover:underline">No tens compte? Registra't</a></div>
    </section>
</div>
