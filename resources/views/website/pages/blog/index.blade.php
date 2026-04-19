@extends('website.layouts.master')
@section('title', app()->getLocale() === 'ar' ? 'المدونة' : 'Blog')

@section('content')
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    @isset($category)
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->getTranslation('name', app()->getLocale()) }}</li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</li>
                    @endisset
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                {{-- Main content --}}
                <div class="col-lg-8">
                    @if ($blogs->count() > 0)
                        <div class="row g-4">
                            @foreach ($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 shadow-sm">
                                        @if ($blog->image)
                                            <a href="{{ route('blog.show', $blog->slug) }}">
                                                <img src="{{ asset($blog->image) }}"
                                                    alt="{{ $blog->getTranslation('title', app()->getLocale()) }}"
                                                    class="card-img-top" style="height: 200px; object-fit: cover;">
                                            </a>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            @if ($blog->category)
                                                <span class="badge bg-primary mb-2" style="width: fit-content;">
                                                    {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                                </span>
                                            @endif
                                            <h5 class="card-title">
                                                <a href="{{ route('blog.show', $blog->slug) }}" class="text-decoration-none text-dark">
                                                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                                                </a>
                                            </h5>
                                            <p class="card-text text-muted small flex-grow-1">
                                                {{ Str::limit(strip_tags($blog->getTranslation('short_description', app()->getLocale())), 120) }}
                                            </p>
                                            <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                                                <small class="text-muted">{{ $blog->created_at->format('M d, Y') }}</small>
                                                <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-sm btn-outline-primary">
                                                    {{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            {{ $blogs->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">{{ app()->getLocale() === 'ar' ? 'لا توجد مقالات بعد.' : 'No blog posts yet.' }}</p>
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="col-lg-4">
                    @if ($categories->count() > 0)
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-2 mb-3">
                                    {{ app()->getLocale() === 'ar' ? 'الفئات' : 'Categories' }}
                                </h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <a href="{{ route('blog.index') }}"
                                            class="text-decoration-none {{ !isset($category) ? 'fw-semibold text-primary' : 'text-dark' }}">
                                            {{ app()->getLocale() === 'ar' ? 'الكل' : 'All' }}
                                        </a>
                                    </li>
                                    @foreach ($categories as $cat)
                                        <li class="mb-2">
                                            <a href="{{ route('blog.category', $cat->slug) }}"
                                                class="text-decoration-none {{ isset($category) && $category->id === $cat->id ? 'fw-semibold text-primary' : 'text-dark' }}">
                                                {{ $cat->getTranslation('name', app()->getLocale()) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
