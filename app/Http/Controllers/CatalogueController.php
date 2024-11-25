<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hasFilters = $request->hasAny(['ctg', 'price', 'src', 'sort']);
        $products = Product::with('productPhotos')
            ->filter($request);

        if ($hasFilters) {
            $products = $products->get();
        } else {
            $products = $products->paginate(9);
        }

        $categories = Category::withCount('products')->get();

        if ($request->ajax()) {
            $view = view('guest.partials._products', compact('products'))->render();
            return response()->json([
                'html' => $view,
                'hasMorePages' => !$hasFilters && $products->hasMorePages(),
            ]);
        }

        return view('guest.catalogue', compact('products', 'categories', 'hasFilters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('guest.product-detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
