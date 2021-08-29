<?php

namespace Buildtalent\Main;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        parent::boot();
        $this->app['Illuminate\Contracts\Http\Kernel']
            ->pushMiddleware('Buildtalent\Main\Classes\CorsMiddleware');
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
