<nav x-data="{ open: false }" class="bg-[#13335c] text-white shadow-sm">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-16 items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="shrink-0 text-lg font-semibold tracking-wide">AppLlibre</a>

            <div class="hidden items-center gap-5 md:flex">
                <a href="{{ route('home') }}" class="text-sm hover:text-[#f6f2d8]">Inici</a>
                <a href="{{ route('catalog') }}" class="text-sm hover:text-[#f6f2d8]">Catàleg</a>
                <a href="{{ route('categories') }}" class="text-sm hover:text-[#f6f2d8]">Categories</a>
                @auth
                    <a href="{{ route('wishlist') }}" class="text-sm hover:text-[#f6f2d8]">Preferits</a>
                    <a href="{{ route('profile') }}" class="text-sm hover:text-[#f6f2d8]">Perfil</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.books') }}" class="text-sm font-medium text-[#fff0a8] hover:text-white">Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="rounded-full border border-white/30 px-3 py-1.5 text-sm hover:bg-white/10">Sortir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm hover:text-[#f6f2d8]">Iniciar sessió</a>
                    <a href="{{ route('register') }}" class="rounded-full bg-[#f6f2d8] px-3 py-1.5 text-sm font-medium text-[#13335c] hover:bg-white">Registrar-se</a>
                @endauth
            </div>

            <button type="button" class="rounded-md p-2 md:hidden" @click="open = !open" aria-label="Obrir menú">
                <span class="text-xl" x-text="open ? '✕' : '☰'"></span>
            </button>
        </div>

        <div x-show="open" x-transition class="border-t border-white/20 pb-4 pt-4 md:hidden">
            <div class="flex flex-col gap-3">
                <a href="{{ route('home') }}" @click="open = false">Inici</a>
                <a href="{{ route('catalog') }}" @click="open = false">Catàleg</a>
                <a href="{{ route('categories') }}" @click="open = false">Categories</a>
                @auth
                    <a href="{{ route('wishlist') }}" @click="open = false">Preferits</a>
                    <a href="{{ route('profile') }}" @click="open = false">Perfil</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.books') }}" @click="open = false">Administració</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>Sortir</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" @click="open = false">Iniciar sessió</a>
                    <a href="{{ route('register') }}" @click="open = false">Registrar-se</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
