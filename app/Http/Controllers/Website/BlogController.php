<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        $categories = BlogCategory::where('is_active', true)->get();

        return view('website.pages.blog.index', compact('blogs', 'categories'));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return view('website.pages.blog.show', compact('blog'));
    }

    public function byCategory(string $categorySlug)
    {
        $category = BlogCategory::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();

        $blogs = Blog::with('category')
            ->where('blog_category_id', $category->id)
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        $categories = BlogCategory::where('is_active', true)->get();

        return view('website.pages.blog.index', compact('blogs', 'categories', 'category'));
    }
}
