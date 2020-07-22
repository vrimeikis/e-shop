<?php

namespace App\Http\Controllers\API;

use App\DTO\Base\CollectionDTO;
use App\DTO\Base\PaginateLengthAwareDTO;
use App\DTO\ProductDTO;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\JsonResponse;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::query()
            ->with('categories')
            ->orderByDesc('created_at')
            ->paginate();

        $paginateDTO = new PaginateLengthAwareDTO($products);
        $productsDTO = new CollectionDTO();

        /** @var Product $product */
        foreach ($products as $product) {
            $productsDTO->pushItem(new ProductDTO($product));
        }

        $paginateDTO->setData($productsDTO);

        return response()->json($paginateDTO);
    }

    /**
     * @param string $slug
     * @return JsonResponse
     */
    public function show(string $slug): JsonResponse
    {
        $product = Product::query()
            ->where('slug', '=', $slug)
            ->firstOrFail();

        $productDTO = new ProductDTO($product);

        return response()->json($productDTO);
    }
}
