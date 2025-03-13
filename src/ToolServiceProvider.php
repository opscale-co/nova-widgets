<?php

namespace Opscale\NovaWidgets;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Opscale\NovaWidgets\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /*Nova::serving(function (ServingNova $event) {
            $this->registerResources();
            $this->registerRoutes();
        });*/
    }

    public function register()
    {
        /*$this->loadConfigs();
        if ($this->app->runningInConsole()) {
            $this->loadCommands();
            $this->loadMigrations();
        }*/
    }

    /*protected function loadResources()
    {
        Nova::resources([]);
    }

    protected function loadRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/opscale-co/nova-widgets')
                ->group(__DIR__.'/../routes/api.php');
    }

    protected function loadConfigs()
    {
        $filename = 'nova-widgets.php';
        $this->publishes([
            __DIR__."/../config/$filename" => config_path($filename),
        ]);
    }

    protected function loadCommands()
    {
        $this->commands([]);
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ]);
    }*/
}
