<?php

namespace BuildTalent\Main;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function boot()
    {
        $this->app['Illuminate\Contracts\Http\Kernel']
            ->pushMiddleware('BuildTalent\Main\Classes\CorsMiddleware');
    }

    public function pluginDetails()
    {
        return [
            'name'        => 'Build Talent Cors',
            'description' => 'Lorem ipsum dolor sit amet',
            'author'      => 'Trung',
            'icon'        => 'icon-leaf'
        ];
    }
}
