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
            'home'     => Home::with('owner', 'users', 'channels')->findOrFail('b972312c-4d98-41f5-a4b6-98246ad0521c'),
            'user'     => User::with('homes')
                            ->where('id', Auth::id())
                            ->first(),
        ]);
    }
}
