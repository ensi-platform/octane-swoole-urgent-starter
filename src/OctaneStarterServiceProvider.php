<?php

namespace Ensi\LaravelOctaneStarter;

use Ensi\LaravelOctaneStarter\Console\OctaneProdStarerCommand;
use Illuminate\Support\ServiceProvider;

class OctaneStarterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OctaneProdStarerCommand::class,
            ]);
        }
    }
}
