<?php

namespace TheShop\CampaignManager\Services;

use Illuminate\Http\RedirectResponse;

class AuthService
{
    public static function logout(): RedirectResponse
    {
        return redirect()->route('campaign-manager.login')
            ->withCookie(cookie()->forget(config('theshop-campaign-manager.auth_cookie_name')));
    }
}