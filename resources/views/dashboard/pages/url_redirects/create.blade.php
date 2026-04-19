@extends('dashboard.layouts.master')
@section('title', 'Create URL redirect')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Create new URL redirect</h5>
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
                    <form action="{{ route('dashboard.url-redirects.store') }}" method="POST">
                        @include('dashboard.pages.url_redirects._form', [
                            'redirect' => null,
                            'redirectTypes' => $redirectTypes,
                            'statuses' => $statuses,
                        ])
                        <div class="mt-4 d-flex gap-2 justify-content-end">
                            <a href="{{ route('dashboard.url-redirects.index') }}" class="btn btn-light">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="ti ti-device-floppy me-1"></i>
                                Create redirect
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
