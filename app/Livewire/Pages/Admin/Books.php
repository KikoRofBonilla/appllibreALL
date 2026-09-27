<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.app-layout')]
class Books extends Component
{
    use WithPagination;

    public ?int $editingId = null;

    #[Validate('required|exists:categories,id')]
    public string $category_id = '';

    #[Validate('required|string|min:2|max:200')]
    public string $title = '';

    #[Validate('required|string|min:2|max:150')]
    public string $author = '';

    public string $isbn = '';
    public string $publisher = '';

    #[Validate('nullable|integer|min:1|max:5000')]
    public ?int $pages = null;

    public string $synopsis = '';
    public string $cover = '';

    #[Validate('required|integer|min:0')]
    public int $total_copies = 1;

    #[Validate('required|integer|min:0')]
    public int $available_copies = 1;

    public function save(): void
    {
        $this->validate();

        if ($this->available_copies > $this->total_copies) {
            $this->addError('available_copies', 'No pot haver-hi més exemplars disponibles que totals.');
            return;
        }

        Book::updateOrCreate(
            ['id' => $this->editingId],
            [
                'category_id' => $this->category_id,
                'title' => $this->title,
                'author' => $this->author,
                'isbn' => $this->isbn ?: null,
                'publisher' => $this->publisher ?: null,
                'pages' => $this->pages,
                'synopsis' => $this->synopsis ?: null,
                'cover' => $this->cover ?: null,
                'total_copies' => $this->total_copies,
                'available_copies' => $this->available_copies,
            ]
        );

        session()->flash('success', $this->editingId ? 'Llibre actualitzat.' : 'Llibre creat.');
        $this->resetForm();
    }

    public function edit(int $id): void
    {
        $book = Book::findOrFail($id);

        $this->editingId = $book->id;
        $this->category_id = (string) $book->category_id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->isbn = $book->isbn ?? '';
        $this->publisher = $book->publisher ?? '';
        $this->pages = $book->pages;
        $this->synopsis = $book->synopsis ?? '';
        $this->cover = $book->cover ?? '';
        $this->total_copies = $book->total_copies;
        $this->available_copies = $book->available_copies;
    }

    public function delete(int $id): void
    {
        Book::findOrFail($id)->delete();
        session()->flash('success', 'Llibre eliminat.');
        $this->resetPage();
    }

    public function resetForm(): void
    {
        $this->reset([
            'editingId', 'category_id', 'title', 'author', 'isbn', 'publisher',
            'pages', 'synopsis', 'cover',
        ]);
        $this->total_copies = 1;
        $this->available_copies = 1;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.pages.admin.books', [
            'books' => Book::with('category')->orderBy('title')->paginate(8),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
