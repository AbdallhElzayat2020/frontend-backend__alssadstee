@extends('dashboard.layouts.master')
@section('title', 'Edit Blog Post')
@section('contentWrapperClass', 'content-wrapper-overflow-visible')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card blogs-form-card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Blog Post</h5>
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

                    <form action="{{ route('dashboard.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.pages.blogs._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
