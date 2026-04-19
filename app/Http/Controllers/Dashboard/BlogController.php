<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    private const SEO_ATTRIBUTES = [
        'meta_title_ar', 'meta_title_en',
        'meta_description_ar', 'meta_description_en',
        'meta_keywords_ar', 'meta_keywords_en',
        'canonical_url_ar', 'canonical_url_en',
        'schema_markup_ar', 'schema_markup_en',
    ];

    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(15);
        return view('dashboard.pages.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::where('is_active', true)->get();
        return view('dashboard.pages.blogs.create', compact('categories'));
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $blog = new Blog();
        $blog->fill(Arr::only($data, self::SEO_ATTRIBUTES));
        $blog->setTranslations('title', $data['title']);
        $blog->setTranslations('short_title', $data['short_title']);
        $blog->setTranslations('short_description', $data['short_description'] ?? ['en' => '', 'ar' => '']);
        $blog->setTranslations('description', $data['description'] ?? ['en' => '', 'ar' => '']);
        $blog->slug = $data['slug'] ?? Blog::generateUniqueSlug($data['title']['en']);
        $blog->blog_category_id = $data['blog_category_id'] ?? null;
        $blog->status = $data['status'] ?? 'active';

        if ($request->hasFile('image')) {
            $this->ensureDir();
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('blogs'), $filename);
            $blog->image = 'blogs/' . $filename;
        }

        $blog->save();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::where('is_active', true)->get();
        return view('dashboard.pages.blogs.edit', compact('blog', 'categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog->fill(Arr::only($data, self::SEO_ATTRIBUTES));
        $blog->setTranslations('title', $data['title']);
        $blog->setTranslations('short_title', $data['short_title']);
        $blog->setTranslations('short_description', $data['short_description'] ?? ['en' => '', 'ar' => '']);
        $blog->setTranslations('description', $data['description'] ?? ['en' => '', 'ar' => '']);

        if (($data['slug'] ?? null) !== null && $data['slug'] !== '') {
            $blog->slug = $data['slug'];
        }

        $blog->blog_category_id = $data['blog_category_id'] ?? null;
        $blog->status = $data['status'] ?? $blog->status;

        if ($request->hasFile('image')) {
            if ($blog->image && File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }
            $this->ensureDir();
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('blogs'), $filename);
            $blog->image = 'blogs/' . $filename;
        }

        $blog->save();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post deleted successfully.');
    }

    private function ensureDir(): void
    {
        if (!File::exists(public_path('blogs'))) {
            File::makeDirectory(public_path('blogs'), 0755, true);
        }
    }
}
