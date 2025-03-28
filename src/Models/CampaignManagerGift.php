<?php

namespace TheShop\CampaignManager\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * TheShop\CampaignManager\Models
 *
 * @property int $id
 * @property string $product_uuid
 * @property string $product_name
 * @property array $minimum_spend
 * @property array $maximum_spend
 */

class CampaignManagerGift extends Model
{
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    protected $fillable = [
        'product_uuid',
        'product_name',
        'minimum_spend',
        'maximum_spend',
    ];

    protected function casts(): array
    {
        return [
            'minimum_spend' => 'json',
            'maximum_spend' => 'json',
        ];
    }
}