<div>
    <section class="grid items-center gap-8 rounded-2xl bg-[#13335c] px-6 py-10 text-white sm:px-10 lg:grid-cols-[1.2fr_0.8fr]">
        <div>
            <p class="mb-3 text-sm font-medium uppercase tracking-[0.2em] text-[#f6f2d8]">Biblioteca AppLlibre</p>
            <h1 class="max-w-2xl text-3xl font-semibold leading-tight sm:text-5xl">Troba el teu proper llibre i guarda els teus preferits.</h1>
            <p class="mt-4 max-w-xl text-sm leading-6 text-white/80 sm:text-base">Un catàleg senzill per buscar llibres per autor, categoria o disponibilitat.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('catalog') }}" class="rounded-lg bg-[#f6f2d8] px-4 py-2.5 text-sm font-semibold text-[#13335c] hover:bg-white">Explorar catàleg</a>
                @guest
                    <a href="{{ route('register') }}" class="rounded-lg border border-white/40 px-4 py-2.5 text-sm font-semibold text-white hover:bg-white/10">Crear compte</a>
                @endguest
            </div>
        </div>
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-2">
            @foreach($books->take(4) as $book)
                <a href="{{ route('books.show', $book) }}" class="overflow-hidden rounded-xl bg-white/10 p-2 backdrop-blur">
                    <img src="{{ $book->cover ? asset($book->cover) : asset('images/default-cover.svg') }}" alt="{{ $book->title }}" class="h-40 w-full rounded-lg object-cover">
                    <p class="mt-2 line-clamp-1 text-xs font-medium">{{ $book->title }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="mt-10">
        <div class="mb-4 flex items-end justify-between gap-4">
            <x-page-heading title="Categories" text="Navega per temàtiques de la biblioteca." />
            <a href="{{ route('catalog') }}" class="text-sm font-medium text-[#13335c] hover:underline">Veure catàleg</a>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($categories as $category)
                <a href="{{ route('catalog', ['category' => $category->id]) }}" class="rounded-xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8] transition hover:-translate-y-0.5">
                    <h3 class="font-semibold text-slate-900">{{ $category->name }}</h3>
                    <p class="mt-1 text-sm text-slate-600">{{ $category->books_count }} llibres</p>
                </a>
            @endforeach
        </div>
    </section>

    <section class="mt-10">
        <x-page-heading title="Llibres recents" text="Alguns dels llibres disponibles al catàleg." />
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($books as $book)
                <x-book-card :book="$book" />
            @endforeach
        </div>
    </section>
</div>
