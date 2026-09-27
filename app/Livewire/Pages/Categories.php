<?php

namespace App\Livewire\Pages;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.app-layout')]
class Categories extends Component
{
    public function render()
    {
        return view('livewire.pages.categories', [
            'categories' => Category::withCount('books')->orderBy('name')->get(),
        ]);
    }
}
