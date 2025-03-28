<?php

namespace TheShop\CampaignManager\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use TheShop\CampaignManager\Models\CampaignManagerUpsell;

class CampaignManagerGiftService
{
    public static function getUUIDs(array $itemsInCart): array
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
            ->orderByDesc('score')
            ->pluck('product_uuid')->toArray();
    }
}