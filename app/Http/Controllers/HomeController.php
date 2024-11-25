<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $latestProduct = Product::with(['productPhotos'])->latest()->take(6)->get();
        $categories = Category::whereIn('name', ['Carrier/Backpack', 'Alat Tenda', 'Sepatu'])
            ->pluck('id', 'name');

        return view('guest.home', compact('latestProduct', 'categories'));
    }
}
