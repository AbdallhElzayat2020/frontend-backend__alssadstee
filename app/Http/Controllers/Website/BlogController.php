<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category')->where('status', 'active');

        if ($request->filled('q')) {
            $search = $request->q;
            $locale = app()->getLocale();
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(title, '$.{$locale}')) LIKE ?", ["%{$search}%"])
                    ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(short_description, '$.{$locale}')) LIKE ?", ["%{$search}%"]);
            });
        }

        $blogs = $query->latest()->paginate(9)->withQueryString();

        $categories = BlogCategory::where('is_active', true)
            ->withCount(['blogs' => fn($q) => $q->where('status', 'active')])
            ->having('blogs_count', '>', 0)
            ->get();

        return view('website.pages.blog.index', compact('blogs', 'categories'));
    }

    public function show(string $slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $categories = BlogCategory::where('is_active', true)
            ->withCount(['blogs' => fn($q) => $q->where('status', 'active')])
            ->having('blogs_count', '>', 0)
            ->get();

        $recentBlogs = Blog::where('status', 'active')
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(4)
            ->get();

        $relatedBlogs = Blog::where('status', 'active')
            ->where('id', '!=', $blog->id)
            ->where('blog_category_id', $blog->blog_category_id)
            ->latest()
            ->take(3)
            ->get();

        return view('website.pages.blog.show', compact('blog', 'categories', 'recentBlogs', 'relatedBlogs'));
    }

    public function byCategory(string $categorySlug, Request $request)
    {
        $category = BlogCategory::where('slug', $categorySlug)
            ->where('is_active', true)
            ->firstOrFail();

        $query = Blog::with('category')
            ->where('blog_category_id', $category->id)
            ->where('status', 'active');

        if ($request->filled('q')) {
            $search = $request->q;
            $locale = app()->getLocale();
            $query->where(function ($q) use ($search, $locale) {
                $q->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(title, '$.{$locale}')) LIKE ?", ["%{$search}%"])
                    ->orWhereRaw("JSON_UNQUOTE(JSON_EXTRACT(short_description, '$.{$locale}')) LIKE ?", ["%{$search}%"]);
            });
        }

        $blogs = $query->latest()->paginate(9)->withQueryString();

        $categories = BlogCategory::where('is_active', true)
            ->withCount(['blogs' => fn($q) => $q->where('status', 'active')])
            ->having('blogs_count', '>', 0)
            ->get();

        return view('website.pages.blog.index', compact('blogs', 'categories', 'category'));
    }
}
