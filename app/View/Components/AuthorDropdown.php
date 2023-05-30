<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthorDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.author-dropdown', [
            // TODO: add condition to only display as authors the users that have uploaded books
            'users' => User::all(),
            'currentUser' => User::firstWhere('username', request('user'))
        ]);
    }
}
