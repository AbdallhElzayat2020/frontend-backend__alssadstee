<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlRedirectRequest;
use App\Http\Requests\UpdateUrlRedirectRequest;
use App\Models\UrlRedirect;

class UrlRedirectController extends Controller
{
    public function index()
    {
        $redirects = UrlRedirect::query()->latest()->paginate(20);

        return view('dashboard.pages.url_redirects.index', compact('redirects'));
    }

    public function create()
    {
        return view('dashboard.pages.url_redirects.create', [
            'redirectTypes' => UrlRedirect::redirectTypes(),
            'statuses' => UrlRedirect::statuses(),
        ]);
    }

    public function store(StoreUrlRedirectRequest $request)
    {
        $data = $request->validated();
        UrlRedirect::query()->create([
            'source_path' => UrlRedirect::normalizeSourceFromUserInput($data['old_url']),
            'target_url' => UrlRedirect::normalizeTargetForStorage($data['new_url']),
            'redirect_type' => $data['redirect_type'],
            'status' => $data['status'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()
            ->route('dashboard.url-redirects.index')
            ->with('success', 'Redirect created successfully.');
    }

    public function edit(UrlRedirect $url_redirect)
    {
        return view('dashboard.pages.url_redirects.edit', [
            'redirect' => $url_redirect,
            'redirectTypes' => UrlRedirect::redirectTypes(),
            'statuses' => UrlRedirect::statuses(),
        ]);
    }

    public function update(UpdateUrlRedirectRequest $request, UrlRedirect $url_redirect)
    {
        $data = $request->validated();
        $url_redirect->update([
            'source_path' => UrlRedirect::normalizeSourceFromUserInput($data['old_url']),
            'target_url' => UrlRedirect::normalizeTargetForStorage($data['new_url']),
            'redirect_type' => $data['redirect_type'],
            'status' => $data['status'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()
            ->route('dashboard.url-redirects.index')
            ->with('success', 'Redirect updated successfully.');
    }

    public function destroy(UrlRedirect $url_redirect)
    {
        $url_redirect->delete();

        return redirect()
            ->route('dashboard.url-redirects.index')
            ->with('success', 'Redirect deleted.');
    }
}
