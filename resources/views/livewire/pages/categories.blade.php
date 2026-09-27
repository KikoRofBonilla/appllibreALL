<div>
    <x-page-heading title="Categories" text="Explora la biblioteca per temàtiques." />

    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($categories as $category)
            <article wire:key="category-page-{{ $category->id }}" class="rounded-xl bg-[#fdfbf0] p-5 shadow-sm ring-1 ring-[#e0d9b8]">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-[#13335c] text-lg">📚</div>
                <h2 class="mt-4 text-lg font-semibold">{{ $category->name }}</h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">{{ $category->description }}</p>
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-slate-500">{{ $category->books_count }} llibres</span>
                    <a href="{{ route('catalog', ['category' => $category->id]) }}" class="rounded-lg bg-[#13335c] px-3 py-2 text-sm font-medium text-white hover:bg-[#0d2746]">Veure llibres</a>
                </div>
            </article>
        @endforeach
    </div>
</div>
