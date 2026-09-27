<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-layout')]
class WishlistPage extends Component
{
    public function remove(int $bookId): void
    {
        auth()->user()->wishlistBooks()->detach($bookId);
        session()->flash('success', 'Llibre eliminat dels preferits.');
    }

    public function render()
    {
        return view('livewire.pages.wishlist', [
            'books' => auth()->user()->wishlistBooks()->with('category')->orderBy('title')->get(),
        ]);
    }
}
