<?php

namespace App\Providers;

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
        $this->loadMigrationsFrom([
            database_path().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR.'Client',
            database_path().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR.'Product',
            database_path().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR.'Category',
        ]);
    }
}
