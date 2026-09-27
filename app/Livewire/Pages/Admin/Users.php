<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.app-layout')]
class Users extends Component
{
    public ?int $editingId = null;

    #[Validate('required|string|min:2|max:100')]
    public string $name = '';

    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|in:user,admin')]
    public string $role = 'user';

    public string $password = '';

    public function save(): void
    {
        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->editingId)],
            'role' => ['required', 'in:user,admin'],
        ];

        if ($this->editingId === null) {
            $rules['password'] = ['required', 'min:8'];
        } elseif ($this->password !== '') {
            $rules['password'] = ['min:8'];
        }

        $this->validate($rules);

        $user = $this->editingId ? User::findOrFail($this->editingId) : new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if ($this->password !== '') {
            $user->password = Hash::make($this->password);
        }
        $user->save();

        session()->flash('success', $this->editingId ? 'Usuari actualitzat.' : 'Usuari creat.');
        $this->resetForm();
    }

    public function edit(int $id): void
    {
        $user = User::findOrFail($id);
        $this->editingId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->password = '';
    }

    public function delete(int $id): void
    {
        if ($id === auth()->id()) {
            session()->flash('error', 'No pots eliminar el teu propi compte d’administrador.');
            return;
        }

        User::findOrFail($id)->delete();
        session()->flash('success', 'Usuari eliminat.');
    }

    public function resetForm(): void
    {
        $this->reset(['editingId', 'name', 'email', 'password']);
        $this->role = 'user';
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.pages.admin.users', [
            'users' => User::orderBy('name')->get(),
        ]);
    }
}
