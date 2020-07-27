<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\ProductFeature
 *
 * @property int $id
 * @property int $product_id
 * @property int $feature_id
 * @property string|null $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductFeature newModelQuery()
 * @method static Builder|ProductFeature newQuery()
 * @method static Builder|ProductFeature query()
 * @method static Builder|ProductFeature whereCreatedAt($value)
 * @method static Builder|ProductFeature whereFeatureId($value)
 * @method static Builder|ProductFeature whereId($value)
 * @method static Builder|ProductFeature whereProductId($value)
 * @method static Builder|ProductFeature whereUpdatedAt($value)
 * @method static Builder|ProductFeature whereValue($value)
 * @mixin \Eloquent
 * @property-read Feature $feature
 */
class ProductFeature extends Model
{

    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'feature_id',
        'value',
    ];

    /**
     * @return BelongsTo
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
