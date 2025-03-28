<?php

namespace TheShop\CampaignManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use TheShop\CampaignManager\Models\CampaignManagerUpsell;

class UpsellController extends Controller
{
    public function index()
    {
        $items = CampaignManagerUpsell::query()
            ->orderByDesc('score')
            ->get();

        return view('campaign-manager::upsell.index', compact('items'));
    }

    public function create()
    {
        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        return view('campaign-manager::upsell.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request);

        CampaignManagerUpsell::create($data);

        return redirect()->route('campaign-manager.upsell.index')->with(['success' => 'Položka vytvorená.']);
    }

    public function edit(Request $request, int $id)
    {
        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        $item = CampaignManagerUpsell::find($id);

        return view('campaign-manager::upsell.edit', compact('item', 'products'));
    }

    public function update(Request $request, int $id)
    {
        $data = $this->validate($request);

        $item = CampaignManagerUpsell::find($id);

        $item->update($data);

        return redirect()->back()->with(['success' => 'Položka upravená.']);
    }

    public function destroy(Request $request, int $id)
    {
        $item = CampaignManagerUpsell::find($id);

        $item->delete();

        return redirect()->back()->with(['success' => 'Položka vymazaná.']);
    }

    private function validate(Request $request): array
    {
        $data = $request->validate([
            'product_uuid'   => ['required'],
            'score'          => ['required'],
            'valid_from'     => ['nullable', 'date'],
            'valid_to'       => ['nullable', 'date'],
        ]);

        $products = json_decode(Storage::get('campaign-manager/products.json'), true);

        $data['product_name'] = $products[$data['product_uuid']]['name'];

        return $data;
    }
}