<?php

use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use TheShop\CampaignManager\Controllers\AuthController;
use TheShop\CampaignManager\Controllers\DashboardController;
use TheShop\CampaignManager\Controllers\GiftController;
use TheShop\CampaignManager\Controllers\UpsellController;
use TheShop\CampaignManager\Middleware\AuthMiddleware;

Route::group([
    'prefix' => 'campaign-manager',
    'middleware' => [StartSession::class, AuthMiddleware::class],
    'as' => 'campaign-manager.'
], static function () {
    Route::resource('gift', GiftController::class);
    Route::resource('upsell', UpsellController::class);

    Route::get('/', DashboardController::class)->name('dashboard');
});

Route::group([
    'prefix' => 'campaign-manager',
    'as' => 'campaign-manager.'
], static function () {
    Route::post('/logout', [AuthController::class, 'APILogout'])->name('api.logout');
    Route::post('/login', [AuthController::class, 'APILogin'])->name('api.login');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});