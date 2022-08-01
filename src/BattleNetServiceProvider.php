<?php

namespace Goldendeveloper\SocialiteProviders\BattleNet;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class BattleNetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Socialite::extend('battlenet', function (Application $app) {
            $config = $app->make('config')->get('services.battlenet');

            $redirect = value(Arr::get($config, 'redirect'));

            return new Provider(
                $app->make('request'),
                $config['client_id'],
                $config['client_secret'],
                Str::startsWith($redirect, '/') ? $app->make('url')->to($redirect) : $redirect,
                Arr::get($config, 'guzzle', [])
            );
        });
    }

/*    /**
     * Register the application services.
     *
     * @return void
    public function register()
    {
        App::bind(BattleNet::class, function()
        {
            return new BattleNet;
        });
    }*/
}
