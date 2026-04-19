<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStaticPageSeoRequest;
use App\Models\StaticPageSeo;

class StaticPageSeoController extends Controller
{
    public function index()
    {
        $pages = StaticPageSeo::query()->orderBy('page_key')->get();

        return view('dashboard.pages.page_seo.index', compact('pages'));
    }

    public function edit(StaticPageSeo $static_page_seo)
    {
        return view('dashboard.pages.page_seo.edit', ['page' => $static_page_seo]);
    }

    public function update(UpdateStaticPageSeoRequest $request, StaticPageSeo $static_page_seo)
    {
        $static_page_seo->update($request->validated());

        return redirect()
            ->route('dashboard.page-seo.index')
            ->with('success', 'Page SEO updated successfully.');
    }
}
