<?php

namespace App\Providers;

use BeyondCode\Mailbox\Facades\Mailbox;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Mailbox::catchAll(CatchAll::class);
    }
}
