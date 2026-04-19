<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogCategoryRequest;
use App\Http\Requests\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::latest()->paginate(20);
        return view('dashboard.pages.blog_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.pages.blog_categories.create');
    }

    public function store(StoreBlogCategoryRequest $request)
    {
        $data = $request->validated();
        $category = new BlogCategory();
        $category->setTranslations('name', $data['name']);
        $category->slug = $data['slug'] ?? BlogCategory::generateUniqueSlug($data['name']['en']);
        $category->is_active = $data['is_active'] ?? true;
        $category->save();

        return redirect()->route('dashboard.blog-categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(BlogCategory $blogCategory)
    {
        return view('dashboard.pages.blog_categories.edit', compact('blogCategory'));
    }

    public function update(UpdateBlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        $data = $request->validated();
        $blogCategory->setTranslations('name', $data['name']);
        $blogCategory->slug = $data['slug'] ?? $blogCategory->slug;
        $blogCategory->is_active = $data['is_active'] ?? $blogCategory->is_active;
        $blogCategory->save();

        return redirect()->route('dashboard.blog-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();
        return redirect()->route('dashboard.blog-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
