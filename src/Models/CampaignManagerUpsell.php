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
 * @property int $score
 * @property Carbon|null $valid_from
 * @property Carbon|null $valid_to
 */

class CampaignManagerUpsell extends Model
{
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    protected $fillable = [
        'product_uuid',
        'product_name',
        'score',
        'valid_from',
        'valid_to',
    ];

    protected function casts(): array
    {
        return [
            'valid_from' => 'date',
            'valid_to' => 'date'
        ];
    }
}