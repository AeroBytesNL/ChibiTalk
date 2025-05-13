<?php

namespace Modules\Homes\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Homes\Models\Home;
use Modules\Users\Models\User;

class HomeShow extends Component
{
    public $home;

    public function mount($home)
    {
        $this->home = $home;
    }

    public function render()
    {
        return view('homes::livewire.home-show', [
            'home'     => Home::with('owner', 'users', 'channels')->findOrFail($this->home),
            'user'     => User::with('homes')
                            ->where('id', Auth::id())
                            ->first(),
        ]);
    }
}
