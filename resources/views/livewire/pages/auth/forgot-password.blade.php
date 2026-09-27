<div class="mx-auto max-w-md">
    <section class="rounded-2xl bg-[#fdfbf0] p-6 shadow-sm ring-1 ring-[#e0d9b8] sm:p-8">
        <h1 class="text-2xl font-semibold">Recuperar contrasenya</h1>
        <p class="mt-1 text-sm text-slate-600">Escriu el correu del compte.</p>
        @if($message)<x-alert type="success" :message="$message" />@endif
        <form wire:submit="sendLink" class="mt-6 space-y-4">
            <div><label class="mb-1.5 block text-sm font-medium">Correu</label><input type="email" wire:model="email" class="w-full rounded-lg border border-[#cfc7a6] bg-white px-3 py-2.5 text-sm">@error('email')<p class="mt-1 text-xs text-red-700">{{ $message }}</p>@enderror</div>
            <x-button type="submit">Enviar enllaç</x-button>
        </form>
        <a href="{{ route('login') }}" class="mt-5 inline-block text-sm text-[#13335c] hover:underline">Tornar a l'inici de sessió</a>
    </section>
</div>
