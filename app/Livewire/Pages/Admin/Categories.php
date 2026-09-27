<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.app-layout')]
class Categories extends Component
{
    public ?int $editingId = null;

    #[Validate('required|string|min:2|max:100')]
    public string $name = '';

    #[Validate('nullable|string|max:255')]
    public string $description = '';

    public function save(): void
    {
        $this->validate();

        Category::updateOrCreate(
            ['id' => $this->editingId],
            ['name' => $this->name, 'description' => $this->description ?: null]
        );

        session()->flash('success', $this->editingId ? 'Categoria actualitzada.' : 'Categoria creada.');
        $this->resetForm();
    }

    public function edit(int $id): void
    {
        $category = Category::findOrFail($id);
        $this->editingId = $category->id;
        $this->name = $category->name;
        $this->description = $category->description ?? '';
    }

    public function delete(int $id): void
    {
        $category = Category::findOrFail($id);

        if ($category->books()->exists()) {
            session()->flash('error', 'No pots eliminar una categoria que encara té llibres.');
            return;
        }

        $category->delete();
        session()->flash('success', 'Categoria eliminada.');
    }

    public function resetForm(): void
    {
        $this->reset(['editingId', 'name', 'description']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.pages.admin.categories', [
            'categories' => Category::withCount('books')->orderBy('name')->get(),
        ]);
    }
}
