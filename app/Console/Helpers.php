<?php

namespace App\Console;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;


class Helpers
{
    public static function isBouncerInstalled()
    {
        $providers = Config::get('app.providers');
        return collect($providers)->contains('Silber\Bouncer\BouncerServiceProvider');
    }
    public static function enumerateBouncerRoles()
    {
        if(Helpers::isBouncerInstalled())
            return User::all()->pluck('name');
            return collect([]);
    }
}