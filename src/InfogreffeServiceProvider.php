<?php

namespace Yemilgr\Infogreffe;

use Illuminate\Support\ServiceProvider;
use Yemilgr\Infogreffe\Console\EnterpriseFicheCommand;

class InfogreffeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Infogreffe::class, function ($app) {
            return new Infogreffe(config('services.infogreffe.token'));
        });

        $this->app->alias(Infogreffe::class, 'infogreffe');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                EnterpriseFicheCommand::class
            ]);
        }
    }
}
