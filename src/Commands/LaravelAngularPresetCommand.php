<?php

namespace Hettiger\LaravelAngularPreset\Commands;

use Illuminate\Console\Command;

class LaravelAngularPresetCommand extends Command
{
    public $signature = 'laravel-angular-preset';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
