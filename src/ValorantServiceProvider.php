<?php

namespace Seaony\ValorantApi;

use Illuminate\Support\ServiceProvider;

class ValorantServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([\dirname(__DIR__).'/config/valorant.php' => config_path('valorant.php')], 'config');
    }

}