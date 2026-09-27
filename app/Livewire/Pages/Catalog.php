<?php

namespace App\Livewire\Pages;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.app-layout')]
class Catalog extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $category = '';

    #[Url]
    public string $availability = 'all';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedAvailability(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'category']);
        $this->availability = 'all';
        $this->resetPage();
    }

    public function render()
    {
        $books = Book::with('category')
            ->when($this->search !== '', function ($query) {
                $term = '%' . $this->search . '%';
                $query->where(function ($q) use ($term) {
                    $q->where('title', 'like', $term)
                        ->orWhere('author', 'like', $term)
                        ->orWhere('isbn', 'like', $term)
                        ->orWhere('publisher', 'like', $term);
                });
            })
            ->when($this->category !== '', fn ($query) => $query->where('category_id', $this->category))
            ->when($this->availability === 'available', fn ($query) => $query->where('available_copies', '>', 0))
            ->when($this->availability === 'unavailable', fn ($query) => $query->where('available_copies', '=', 0))
            ->orderBy('title')
            ->paginate(8);

        return view('livewire.pages.catalog', [
            'books' => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
