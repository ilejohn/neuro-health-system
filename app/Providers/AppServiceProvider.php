<?php

namespace BrainApp\Providers;

use BrainApp\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(User $user)
    {
        /*
         Determine logged in user status

        */
        Blade::if('status', function ($status) {

            return Auth::user()->hasStatus($status);

        });

        /*
         Determine if currently logged in user can manipulate accessed resource
         
        */
        Blade::if('self', function (User $user) {

            return Auth::user()->id === $user->id;
       });

       View::share('user', $user);
    }
}
