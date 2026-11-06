<?php

namespace Opscale\NovaWidgets;

use Opscale\NovaWidgets\Configuration\NovaPackage;
use Opscale\NovaWidgets\Configuration\NovaPackageServiceProvider;
use Opscale\NovaWidgets\Nova\Widget;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;

class ToolServiceProvider extends NovaPackageServiceProvider
{
    public function newPackage(): Package
    {
        return new NovaPackage;
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('nova-widgets')
            ->discoversMigrations()
            ->runsMigrations()
            ->hasRoutes(['api'])
            ->hasResources([Widget::class])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('opscale-co/nova-widgets');
            });
    }
}
