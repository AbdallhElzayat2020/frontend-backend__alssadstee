@extends('dashboard.layouts.master')
@section('title', 'Website pages SEO')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Static pages — meta &amp; SEO</h5>
                    <p class="text-muted small mb-0 mt-1">Values are shown on the site by current language (Arabic / English).</p>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Key</th>
                                    <th>Updated</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::title(str_replace('-', ' ', $page->page_key)) }}</td>
                                        <td><code>{{ $page->page_key }}</code></td>
                                        <td>{{ $page->updated_at?->format('Y-m-d H:i') }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('dashboard.page-seo.edit', $page) }}" class="btn btn-sm btn-primary">
                                                <i class="ti ti-edit me-1"></i>
                                                Edit SEO
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
