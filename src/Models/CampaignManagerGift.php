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
    ];

    protected function casts(): array
    {
        return [
            'minimum_spend' => 'json',
        ];
    }
}