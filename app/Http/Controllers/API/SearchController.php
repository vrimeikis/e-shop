<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\SearchRequest;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        return Product::query()
            ->where('title', 'LIKE', $request->getQuery())
            ->paginate();
    }
}
