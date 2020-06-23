<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        $products = Product::query()->paginate();

        foreach ($products as &$product) {
            $product['images'] = $product->getFirstImageUrl();
        }

        return response()->json($products);
    }
}
