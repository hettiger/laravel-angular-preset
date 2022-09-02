<?php

namespace Hettiger\LaravelAngularPreset\Commands;

use Illuminate\Console\Command;

class LaravelAngularPresetCommand extends Command
{
    public $signature = 'laravel-angular-preset:install';

    public $description = 'Installs angular frontend preset';

    public function handle(): int
    {
        $this->installAngular();

        $this->comment('All done');

        return self::SUCCESS;
    }

    protected function installAngular()
    {
        $this->info('Installing Angular to `resources/angular`');

        $this->withProgressBar([
            fn() => exec('npm install -D @angular/cli'),
            fn() => exec('cd resources && ng new angular'),
        ], fn($action) => $action());
    }
}
