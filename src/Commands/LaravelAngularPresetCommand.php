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
        $this->configureAngular();
        $this->addNodeScripts();

        $this->comment('All done');

        return self::SUCCESS;
    }

    protected function installAngular()
    {
        $this->info('Installing Angular to `resources/angular`');

        $this->withProgressBar([
            fn () => exec('npm install -D @angular/cli'),
            fn () => exec('cd resources && ng new angular'),
        ], fn ($action) => $action());

        $this->newLine(2);
    }

    protected function configureAngular()
    {
        $this->info('Configuring Angular in `resources/angular`');

        $this->withProgressBar([
            fn () => copy(__DIR__.'/../../stubs/extra-webpack.config.js', resource_path('angular/extra-webpack.config.js')),
            fn () => copy(__DIR__.'/../../stubs/index-html-transform.js', resource_path('angular/index-html-transform.js')),

            fn () => exec('cd resources/angular && npm i -D @angular-builders/custom-webpack'),
            fn () => exec('cd resources/angular && npm i -D dotenv dotenv-expand'),
            fn () => exec('cd resources/angular && npm i -D webpack'),

            fn () => exec('cd resources/angular && ng config projects.angular.architect.build.builder "@angular-builders/custom-webpack:browser"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.serve.builder "@angular-builders/custom-webpack:dev-server"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.extract-i18n.builder "@angular-builders/custom-webpack:extract-i18n"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.test.builder "@angular-builders/custom-webpack:karma"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.build.options.customWebpackConfig.path "./extra-webpack.config.js"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.build.options.indexTransform "./index-html-transform.js"'),
            fn () => exec('cd resources/angular && ng config projects.angular.architect.build.options.outputPath "../../public/angular"'),
        ], fn ($action) => $action());

        $this->newLine(2);
    }

    protected function addNodeScripts()
    {
        $this->info('Adding convenience Node / NPM scripts');

        static::updateNodeScripts(fn (array $scripts) => array_merge($scripts, [
            'ng:dev' => 'cd resources/angular && npm run build -- --configuration development && cd - && cp public/angular/index.html resources/views/angular.blade.php',
            'ng:watch' => 'npm run ng:dev && cd resources/angular && npm run build -- --configuration development --watch',
            'ng:prod' => 'cd resources/angular && npm run build && cd - && cp public/angular/index.html resources/views/angular.blade.php',
            'ng:test' => 'cd resources/angular && ng test',
        ]));
    }

    protected static function updateNodeScripts(callable $callback)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = 'scripts';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = $callback(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : [],
            $configurationKey
        );

        ksort($packages[$configurationKey]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }
}
