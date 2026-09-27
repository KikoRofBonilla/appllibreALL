<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.app-layout')]
class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    public ?string $message = null;

    public function sendLink(): void
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->message = 'Si el correu existeix, trobaràs un enllaç de recuperació al fitxer de log.';
            return;
        }

        $this->addError('email', __($status));
    }

    public function render()
    {
        return view('livewire.pages.auth.forgot-password');
    }
}
