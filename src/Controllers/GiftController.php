<?php

namespace TheShop\CampaignManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use TheShop\CampaignManager\Models\CampaignManagerGift;

class GiftController extends Controller
{
    public function index()
    {
        $items = CampaignManagerGift::all();

        return view('campaign-manager::gift.index', compact('items'));
    }

    public function create()
    {
        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        return view('campaign-manager::gift.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request);

        CampaignManagerGift::create($data);

        return redirect()->route('campaign-manager.gift.index')->with(['success' => 'Položka vytvorená.']);
    }

    public function edit(Request $request, int $id)
    {
        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        $item = CampaignManagerGift::find($id);

        return view('campaign-manager::gift.edit', compact('item', 'products'));
    }

    public function update(Request $request, int $id)
    {
        $data = $this->validate($request);

        $item = CampaignManagerGift::find($id);

        $item->update($data);

        return redirect()->back()->with(['success' => 'Položka upravená.']);
    }

    public function destroy(Request $request, int $id)
    {
        $item = CampaignManagerGift::find($id);

        $item->delete();

        return redirect()->back()->with(['success' => 'Položka vymazaná.']);
    }

    private function validate(Request $request): array
    {
        $data = $request->validate([
            'product_uuid'  => ['required'],
            'minimum_spend' => ['required'],
            'maximum_spend' => ['required'],
            'is_concept' => ['boolean'],
        ]);

        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        $data['product_name'] = $products[$data['product_uuid']]['name'];

        return $data;
    }
}