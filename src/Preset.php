<?php

namespace CodeZero\LaravelPreset\Vue;

use File;
use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;

class Preset extends BasePreset
{
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateStyles();
        static::updateJavaScript();
        static::updateTemplates();
        static::removeNodeModules();
        static::updateGitignore();
        static::deleteYarn();
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            'laravel-mix-purgecss' => '^3.0.0',
            'laravel-mix-tailwind' => '^0.1.0',
            'tailwindcss' => '^0.6.6',
        ], Arr::except($packages, [
            'bootstrap',
            'bootstrap-sass',
            'jquery',
            'lodash',
            'popper.js',
        ]));
    }

    protected static function updateWebpackConfiguration()
    {
        File::copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateStyles()
    {
        File::cleanDirectory(resource_path('sass'));
        File::cleanDirectory(public_path('css'));
        File::copy(__DIR__.'/stubs/app.scss', resource_path('sass/app.scss'));
    }

    protected static function updateJavaScript()
    {
        File::cleanDirectory(resource_path('js'));
        File::cleanDirectory(public_path('js'));
        File::copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
    }

    protected static function updateTemplates()
    {
        File::delete(resource_path('views/home.blade.php'));
        File::delete(resource_path('views/welcome.blade.php'));
        File::copyDirectory(__DIR__.'/stubs/views', resource_path('views'));
    }

    protected static function updateGitignore()
    {
        File::copy(__DIR__.'/stubs/gitignore-stub', base_path('.gitignore'));
    }

    protected static function deleteYarn()
    {
        File::delete(base_path('yarn.lock'));
    }
}
