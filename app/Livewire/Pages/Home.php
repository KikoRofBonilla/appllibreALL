<?php

namespace App\Livewire\Pages;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-layout')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home', [
            'books' => Book::with('category')->latest()->take(6)->get(),
            'categories' => Category::withCount('books')->orderBy('name')->get(),
        ]);
    }
}
