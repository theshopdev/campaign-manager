<?php

namespace TheShop\CampaignManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CampaignManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/theshop-campaign-manager.php', 'theshop-campaign-manager');

        Route::group([
            'prefix' => 'campaign-manager',
            'as' => 'campaign-manager.',
            'middleware' => 'web',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../views', 'campaign-manager');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}