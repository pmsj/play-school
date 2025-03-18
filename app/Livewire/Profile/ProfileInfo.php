<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class ProfileInfo extends Component 
{
    use WithFileUploads;
    
    public $name;
    public $email;
    public $photo;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateProfile(UpdatesUserProfileInformation $updater)
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('profile-photos', 'public'); // Store photo
        }

        // Use Jetstream's profile update action
        $updater->update($this->user, $validatedData);

        session()->flash('message', 'Profile updated successfully.');
    }

    // #[Layout('livewire.dashboard')]
    public function render()
    {
        return view('livewire.profile.profile-info');
    }
    
}
