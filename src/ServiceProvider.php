<?php

declare(strict_types=1);

namespace VertaalbureauPerfect\ActionPattern;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use VertaalbureauPerfect\ActionPattern\Commands\ActionMakeCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ActionMakeCommand::class,
            ]);
        }
    }
}
