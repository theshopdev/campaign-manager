<?php

namespace TheShop\CampaignManager;

use Illuminate\Support\ServiceProvider;

class CampaignManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/theshop-campaign-manager.php', 'theshop-campaign-manager');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../views', 'campaign-manager');

        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }
}