<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'AppLlibre' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-[#f6f2d8] text-slate-900">
    <x-navbar />

    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif

        {{ $slot }}
    </main>

    <footer class="mt-12 border-t border-[#d7d0ae] bg-[#f2eed0]">
        <div class="mx-auto max-w-7xl px-4 py-6 text-sm text-slate-700 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <span>AppLlibre · Biblioteca</span>
                <span>Projecte Desenvolupament web Kiko</span>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
