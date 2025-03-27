<?php

namespace TheShop\CampaignManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use TheShop\CampaignManager\Services\AuthService;

class AuthController extends Controller
{
    public function login()
    {
        return view('campaign-manager::auth.login');
    }

    public function APILogin(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email'    => ['required'],
            'password' => ['required'],
        ]);

        $APIRequest = Http::asJson()
            ->acceptJson()
            ->post('https://'.config('theshop-campaign-manager.host').'/api/admin/auth/login', [
                'email'    => $data['email'],
                'password' => $data['password'],
            ]);

        if($APIRequest->successful()) {
            $authKey = $APIRequest->getHeader('Authorization')[0] ?? null;

            if(is_null($authKey)) {
                return AuthService::logout();
            }

            return redirect()->route('campaign-manager.dashboard')->withCookie(cookie(config('theshop-campaign-manager.auth_cookie_name'), $authKey, 60, null, null, true, true, false, 'Strict'));
        }

        return AuthService::logout();
    }

    public function APILogout() {
        return AuthService::logout();
    }
}