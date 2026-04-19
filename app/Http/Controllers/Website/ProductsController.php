<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        try {
            $products = Product::latest()->paginate(12);
            return view('website.pages.products', compact('products'));
        } catch (\Exception $e) {
            return response('Products index error: ' . $e->getMessage());
        }
    }

    public function show(string $slug)
    {
        $product = Product::query()->where('slug', $slug)->firstOrFail();

        return view('website.pages.product_show', compact('product'));
    }
}
