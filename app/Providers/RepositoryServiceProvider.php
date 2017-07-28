<?php

namespace Finlaravel\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Finlaravel\Repositories\BankRepository::class, \Finlaravel\Repositories\BankRepositoryEloquent::class);
        //:end-bindings:
    }
}
