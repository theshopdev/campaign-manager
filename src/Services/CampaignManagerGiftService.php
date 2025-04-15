<?php

namespace TheShop\CampaignManager\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use TheShop\CampaignManager\Models\CampaignManagerGift;
use TheShop\CampaignManager\Models\CampaignManagerUpsell;

class CampaignManagerGiftService
{
    public static function getUUIDs(string $currency): array
    {
        $currency = Str::lower($currency);

        if (!in_array($currency, config('theshop-campaign-manager.currencies'))) {
            return [];
        }

        return CampaignManagerGift::query()
            ->pluck('product_uuid')
            ->toArray();
    }
    public static function getGifts(string $currency): array
    {
        $currency = Str::lower($currency);

        if (!in_array($currency, config('theshop-campaign-manager.currencies'))) {
            return [];
        }

        return CampaignManagerGift::query()
            ->orderByRaw("CAST(JSON_EXTRACT(minimum_spend, '$.$currency') AS UNSIGNED)")
            ->get()
            ->keyBy('product_uuid')
            ->toArray();
    }

    public static function getAvailableUUIDs(float $value, string $currency): array
    {
        $currency = Str::lower($currency);

        if (!in_array($currency, config('theshop-campaign-manager.currencies'))) {
            return [];
        }

        return CampaignManagerGift::query()
            ->whereRaw("CAST(JSON_EXTRACT(minimum_spend, '$.$currency') AS UNSIGNED) <= ?", [$value])
            ->where(function($query) use ($currency, $value) {
                $query->whereRaw("CAST(JSON_EXTRACT(maximum_spend, '$.$currency') AS UNSIGNED) >= ?", [$value])
                    ->orWhereRaw("CAST(JSON_EXTRACT(maximum_spend, '$.$currency') AS UNSIGNED) = -1");
            })
            ->pluck('product_uuid')
            ->toArray();
    }

    public static function isGift(string $uuid): bool
    {
        return CampaignManagerGift::query()
            ->where('product_uuid', $uuid)
            ->exists();
    }

    public static function getRanges(string $currency)
    {
        $currency = Str::lower($currency);

        if (!in_array($currency, config('theshop-campaign-manager.currencies'))) {
            return [];
        }

        return CampaignManagerGift::query()
            ->selectRaw("CAST(JSON_EXTRACT(minimum_spend, '$.$currency') AS UNSIGNED) as range")
            ->groupBy('range')
            ->orderBy('range')
            ->pluck('range')
            ->toArray();
    }
}