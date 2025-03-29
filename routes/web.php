<?php

use Illuminate\Support\Facades\Route;
use TheShop\CampaignManager\Controllers\AuthController;
use TheShop\CampaignManager\Controllers\DashboardController;
use TheShop\CampaignManager\Controllers\ProductController;
use TheShop\CampaignManager\Controllers\GiftController;
use TheShop\CampaignManager\Controllers\UpsellController;
use TheShop\CampaignManager\Middleware\AuthMiddleware;

Route::group([
    'middleware' => [AuthMiddleware::class],
], static function () {
    Route::resource('gift', GiftController::class);
    Route::resource('upsell', UpsellController::class);

    Route::get('/product/download', ProductController::class)->name('product.download');
    Route::get('/', DashboardController::class)->name('dashboard');
});

Route::post('/logout', [AuthController::class, 'APILogout'])->name('api.logout');
Route::post('/login', [AuthController::class, 'APILogin'])->name('api.login');
Route::get('/login', [AuthController::class, 'login'])->name('login');