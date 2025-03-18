<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdatePassword extends Component implements UpdatesUserPasswords
{
    
    /**
     * Form state
     */
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public function updatePassword(UpdatesUserPasswords $updater)
    {
        $user = Auth::user();

        // Validate and update the password
        $updater->update($user, $this->state);

        // Reset input fields
        $this->reset('state');

        // Show success message
        session()->flash('status', 'Password updated successfully.');
    }


    #[Layout('layouts.dashboard')]
    public function render()
    {
        return view('livewire.profile.update-password');
    }
}
