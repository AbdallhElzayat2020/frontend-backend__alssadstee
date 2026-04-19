@extends('dashboard.layouts.master')
@section('title', 'Edit SEO — ' . $page->page_key)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <h5 class="card-title mb-0">SEO:
                            {{ \Illuminate\Support\Str::title(str_replace('-', ' ', $page->page_key)) }}</h5>
                        <code class="small">{{ $page->page_key }}</code>
                    </div>
                    <a href="{{ route('dashboard.page-seo.index') }}" class="btn btn-label-secondary btn-sm">Back to list</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.page-seo.update', $page) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            @include('dashboard.components.seo_fields', ['seoModel' => $page])
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i>
                                Save
                            </button>
                            <a href="{{ route('dashboard.page-seo.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
