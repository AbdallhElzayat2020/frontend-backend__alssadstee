@extends('dashboard.layouts.master')
@section('title', 'Edit URL redirect')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <h5 class="card-title mb-0">Edit URL redirect</h5>
                    <a href="{{ route('dashboard.url-redirects.index') }}" class="btn btn-label-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('dashboard.url-redirects.update', $redirect) }}" method="POST">
                        @method('PUT')
                        @include('dashboard.pages.url_redirects._form', [
                            'redirect' => $redirect,
                            'redirectTypes' => $redirectTypes,
                            'statuses' => $statuses,
                        ])

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <div class="p-3 rounded border bg-label-secondary">
                                    <div class="small text-muted">Total hits</div>
                                    <div class="fs-4 fw-semibold">{{ number_format($redirect->hits_count) }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 rounded border bg-label-secondary">
                                    <div class="small text-muted">Last hit</div>
                                    <div class="fs-6 fw-semibold">
                                        @if ($redirect->last_hit_at)
                                            {{ $redirect->last_hit_at->format('Y-m-d H:i:s') }}
                                        @else
                                            Never
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 d-flex gap-2 justify-content-end">
                            <a href="{{ route('dashboard.url-redirects.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i>
                                Update redirect
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
