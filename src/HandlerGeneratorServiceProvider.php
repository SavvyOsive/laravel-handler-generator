<?php

namespace Savvyosive\HandlerGenerator;

use Savvyosive\HandlerGenerator\Commands\HandlerGeneratorCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HandlerGeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-handler-generator')
            ->hasConfigFile()
            //->hasViews()
            //->hasMigration('create_laravel-handler-generator_table')
            ->hasCommand(HandlerGeneratorCommand::class);

        HandlerGenerator::handler()->generate();
    }
}
