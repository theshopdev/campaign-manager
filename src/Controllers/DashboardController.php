<?php

namespace TheShop\CampaignManager\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('campaign-manager::dashboard');
    }
}