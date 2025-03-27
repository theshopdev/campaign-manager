<?php

namespace TheShop\CampaignManager\Middleware;

use Illuminate\Support\Facades\Http;
use TheShop\CampaignManager\Services\AuthService;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        $authKey = request()->cookie(config('theshop-campaign-manager.auth_cookie_name'));

        if(is_null($authKey)) {
            return redirect()->route('campaign-manager.login');
        }

        $userRequest = Http::asJson()
            ->acceptJson()
            ->withToken($authKey)
            ->get('https://'.config('theshop-campaign-manager.host').'/api/admin/auth/user');

        if(!$userRequest->successful()) {
            return AuthService::logout();
        }

        $user = $userRequest->json();

        $roles = $user['data']['rolesArray'] ?? [];

        if(!in_array('admin', $roles, true)) {
            return AuthService::logout();
        }

        return $next($request);
    }
}