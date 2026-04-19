@extends('dashboard.layouts.master')
@section('title', 'Blog Categories')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Blog Categories</h5>
                    <a href="{{ route('dashboard.blog-categories.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i>Add Category
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($categories->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (EN)</th>
                                        <th>Name (AR)</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->getTranslation('name', 'en') }}</td>
                                            <td dir="rtl">{{ $category->getTranslation('name', 'ar') }}</td>
                                            <td><code>{{ $category->slug }}</code></td>
                                            <td>
                                                @if ($category->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('dashboard.blog-categories.edit', $category) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="ti ti-edit me-1"></i>Edit
                                                    </a>
                                                    <form action="{{ route('dashboard.blog-categories.destroy', $category) }}"
                                                        method="POST" onsubmit="return confirm('Delete this category?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="ti ti-trash me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $categories->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">No categories found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
