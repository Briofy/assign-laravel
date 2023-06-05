<?php

namespace Briofy\Assign\Providers;

use Briofy\Assign\Repositories\AssignRepository;
use Briofy\Assign\Repositories\IAssignRepository;
use Illuminate\Support\ServiceProvider;

class AssignServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/briofy-assign.php', 'briofy-assign');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../Config/briofy-assign.php' => config_path('briofy-assign.php'),
            ], 'briofy-assign-config');

            $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
        }

        $this->app->bind(IAssignRepository::class, AssignRepository::class);
    }
}
