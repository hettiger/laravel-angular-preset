<?php

namespace Hettiger\LaravelAngularPreset;

use Hettiger\LaravelAngularPreset\Commands\LaravelAngularPresetCommand;
use Illuminate\Support\Facades\File;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelAngularPresetServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-angular-preset')
            ->hasCommand(LaravelAngularPresetCommand::class);
    }

    public function boot()
    {
        $this->loadRoutes();

        return parent::boot();
    }

    protected function loadRoutes()
    {
        $routesPath = base_path('routes/angular.php');

        if (File::exists($routesPath)) {
            $this->loadRoutesFrom($routesPath);
        }
    }
}
