<?php

namespace App\Providers;

use App\Console\Commands\UserList;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }


    /**
     * Register artisan console commands
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->commands(UserList::class);
    }
}
