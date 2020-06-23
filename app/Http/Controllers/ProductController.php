<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $products = Product::query()->paginate();

        return view('products.list', ['list' => $products]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('products.form');
    }

    /**
     * @param ProductStoreRequest $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $product = Product::query()->create($request->getData());
        if ($image1 = $request->getImage1()) {
            $product->addMedia($image1)->toMediaCollection('product_images');
        }

        return redirect()->route('products.index')
            ->with('status', 'Created.');
    }
}
