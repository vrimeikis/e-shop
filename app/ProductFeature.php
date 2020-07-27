<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
 */
class ProductFeature extends Model
{
    protected $fillable = [
        'product_id',
        'feature_id',
        'value',
    ];
}
