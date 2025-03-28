<?php

namespace TheShop\CampaignManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __invoke()
    {
        $products = [];

        $productsRequest = Http::asJson()
            ->acceptJson()
            ->withToken(request()->cookie(config('theshop-campaign-manager.auth_cookie_name')))
            ->withQueryParameters([
                'limit' => 1000,
                'offset' => 0
            ])
            ->get('https://'.config('theshop-campaign-manager.host').'/api/admin/products');

        if ($productsRequest->successful()) {
            $items = $productsRequest->json()['items'] ?? [];

            foreach ($items as $item) {
                $products[$item['uuid']] = [
                    'uuid' => $item['uuid'],
                    'name' => $item['name'],
                ];
            }
        }

        Storage::put('campaign-manager/products.json', json_encode($products));

        return redirect()->back()->with(['success' => 'Položky aktualizované.']);
    }
}