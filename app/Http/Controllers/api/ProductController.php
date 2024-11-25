<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function showByIds(ShowProductRequest $request)
    {
        $products = Product::with(['category', 'productPhotos'])
            ->whereIn('id', $request->getProductsIds())
            ->get();

        return ProductResource::collection($products);
    }
}
