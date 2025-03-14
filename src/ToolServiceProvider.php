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
        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
        }

        Nova::serving(function (ServingNova $event) {
            $this->registerResources();
        });
    }

    public function register()
    {
        //
    }

    protected function registerResources()
    {
        Nova::resources([
            \Opscale\NovaWidgets\Nova\Widget::class,
        ]);
    }

    protected function registerRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/opscale-co/nova-widgets')
            ->group(__DIR__ . '/../routes/api.php');
    }

    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ]);
    }
}
