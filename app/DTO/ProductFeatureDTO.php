<?php

declare(strict_types = 1);

namespace App\DTO;

use App\DTO\Base\DTO;
use App\ProductFeature;

/**
 * Class ProductFeatureDTO
 * @package App\DTO
 */
class ProductFeatureDTO extends DTO
{
    /**
     * @var ProductFeature
     */
    private $feature;

    /**
     * ProductFeatureDTO constructor.
     * @param ProductFeature $feature
     */
    public function __construct(ProductFeature $feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return array
     */
    protected function jsonData(): array
    {
        return [
            'title' => $this->feature->feature->title,
            'value' => $this->feature->value,
        ];
    }
}