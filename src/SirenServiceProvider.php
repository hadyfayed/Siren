<?php

namespace HadyFayed\Siren;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use HadyFayed\Siren\Commands\SirenInstallCommand;

class SirenServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('siren')
//            ->hasConfigFile()
//            ->hasViews()
//            ->hasMigration('create_siren_table')
            ->hasCommand(SirenInstallCommand::class);
    }
}
