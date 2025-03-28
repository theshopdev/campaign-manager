<?php

namespace TheShop\CampaignManager\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use TheShop\CampaignManager\Models\CampaignManagerUpsell;

class CampaignManagerUpsellService
{
    public static function getUUIDs(array $itemsInCart, ?int $limit = null): array
    {
        return CampaignManagerUpsell::query()
            ->whereNotIn('product_uuid', $itemsInCart)
            ->where(function (Builder $query) {
                $query->whereNull('valid_from')
                    ->orWhereDate('valid_from', '<=', Carbon::today());
            })
            ->where(function (Builder $query) {
                $query->whereNull('valid_to')
                    ->orWhereDate('valid_to', '>=', Carbon::today());
            })
            ->when(!is_null($limit), function ($q) use ($limit) {
                $q->limit($limit);
            })
            ->orderByDesc('score')
            ->pluck('product_uuid')->toArray();
    }
}