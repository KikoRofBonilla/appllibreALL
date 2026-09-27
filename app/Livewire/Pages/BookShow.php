<?php

namespace App\Livewire\Pages;

use App\Models\Book;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-layout')]
class BookShow extends Component
{
    public Book $book;

    public function mount(Book $book): void
    {
        $this->book = $book->load('category');
    }

    public function toggleWishlist(): void
    {
        abort_unless(auth()->check(), 403);

        $user = auth()->user();

        if ($user->wishlistBooks()->whereKey($this->book->id)->exists()) {
            $user->wishlistBooks()->detach($this->book->id);
            session()->flash('success', 'Llibre eliminat dels preferits.');
        } else {
            $user->wishlistBooks()->attach($this->book->id);
            session()->flash('success', 'Llibre afegit als preferits.');
        }
    }

    public function render()
    {
        $inWishlist = auth()->check()
            ? auth()->user()->wishlistBooks()->whereKey($this->book->id)->exists()
            : false;

        return view('livewire.pages.book-show', compact('inWishlist'));
    }
}
