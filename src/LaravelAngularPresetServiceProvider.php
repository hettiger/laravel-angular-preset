<?php

namespace Hettiger\LaravelAngularPreset;

use Hettiger\LaravelAngularPreset\Commands\LaravelAngularPresetCommand;
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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-angular-preset_table')
            ->hasCommand(LaravelAngularPresetCommand::class);
    }
}
