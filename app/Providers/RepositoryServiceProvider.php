<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\Interfaces\ReviewRepositoryInterface::class, \App\Repositories\ReviewRepository::class);
        $this->app->bind(\App\Repositories\Interfaces\BookRepositoryInterface::class, \App\Repositories\BookRepository::class);
        //:end-bindings:
    }
}
