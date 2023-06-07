<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'DemetriusVissarion';
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin'); // '?' makes it to run only if we have a user
        });

        Gate::define('users', function (User $user) {
            return $user->username !== 'DemetriusVissarion';
        });

        Blade::if('users', function () {
            return request()->user()?->can('users'); // '?' makes it to run only if we have a user
        });

        Gate::define('update-book', function (User $user, Book $book) {
            return $user->id === $book->user_id;
        });
    }
}
