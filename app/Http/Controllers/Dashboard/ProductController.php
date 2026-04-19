<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    private const SEO_ATTRIBUTES = [
        'meta_title_ar',
        'meta_title_en',
        'meta_description_ar',
        'meta_description_en',
        'meta_keywords_ar',
        'meta_keywords_en',
        'canonical_url_ar',
        'canonical_url_en',
        'schema_markup_ar',
        'schema_markup_en',
    ];

    public function index()
    {
        $products = Product::latest()->paginate(15);
        return view('dashboard.pages.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.pages.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = new Product();
        $product->fill(Arr::only($data, self::SEO_ATTRIBUTES));
        $product->setTranslations('name', $data['name']);
        $product->setTranslations('description', $data['description'] ?? []);

        $product->slug = ($data['slug'] ?? null) !== null && $data['slug'] !== ''
            ? $data['slug']
            : Product::generateUniqueSlug($data['name']['en']);

        if ($request->hasFile('image')) {
            if (!File::exists(public_path('products'))) {
                File::makeDirectory(public_path('products'), 0755, true);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products'), $filename);
            $product->image = 'products/' . $filename;
        }
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully');
    }

    public function edit(Product $product)
    {
        return view('dashboard.pages.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->fill(Arr::only($data, self::SEO_ATTRIBUTES));
        $product->setTranslations('name', $data['name']);
        $product->setTranslations('description', $data['description'] ?? []);

        if (($data['slug'] ?? null) !== null && $data['slug'] !== '') {
            $product->slug = $data['slug'];
        } elseif ($product->slug === null || $product->slug === '') {
            $product->slug = Product::generateUniqueSlug($data['name']['en']);
        }

        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            if (!File::exists(public_path('products'))) {
                File::makeDirectory(public_path('products'), 0755, true);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('products'), $filename);
            $product->image = 'products/' . $filename;
        }
        $product->save();
        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }
        }
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully');
    }
}
