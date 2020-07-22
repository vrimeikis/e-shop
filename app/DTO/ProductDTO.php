<?php

declare(strict_types = 1);

namespace App\DTO;

use App\DTO\Base\DTO;
use App\Product;

class ProductDTO extends DTO
{
    /**
     * @var Product
     */
    private $product;

    /**
     * ProductDTO constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    protected function jsonData(): array
    {
        return [
            'id' => $this->product->id,
            'name' => $this->product->title,
            'slug' => $this->product->slug,
            'images' => $this->product->getAllImagesUrls(),
            'price' => $this->product->price,
            'categories' => [],
            'vat' => $this->product->vat,
            'description' => $this->product->description,
            'inStock' => $this->product->quantity,
            'size' => null,
        ];
    }
}