@extends('website.layouts.master')
@section('title', $blog->getTranslation('title', app()->getLocale()))

@section('content')
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">{{ $blog->getTranslation('title', app()->getLocale()) }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</a></li>
                    @if ($blog->category)
                        <li class="breadcrumb-item">
                            <a href="{{ route('blog.category', $blog->category->slug) }}">
                                {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ Str::limit($blog->getTranslation('title', app()->getLocale()), 50) }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($blog->image)
                        <img src="{{ asset($blog->image) }}"
                            alt="{{ $blog->getTranslation('title', app()->getLocale()) }}"
                            class="img-fluid rounded mb-4 w-100" style="max-height: 400px; object-fit: cover;">
                    @endif

                    @if ($blog->category)
                        <a href="{{ route('blog.category', $blog->category->slug) }}"
                            class="badge bg-primary text-decoration-none mb-3 d-inline-block">
                            {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                        </a>
                    @endif

                    <h1 class="mb-2">{{ $blog->getTranslation('title', app()->getLocale()) }}</h1>
                    <p class="text-muted small mb-4">{{ $blog->created_at->format('F d, Y') }}</p>

                    @if ($blog->getTranslation('short_description', app()->getLocale()))
                        <p class="lead text-muted border-start border-primary border-3 ps-3 mb-4">
                            {!! $blog->getTranslation('short_description', app()->getLocale()) !!}
                        </p>
                    @endif

                    <div class="blog-content">
                        {!! $blog->getTranslation('description', app()->getLocale()) !!}
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }} me-1"></i>
                            {{ app()->getLocale() === 'ar' ? 'العودة للمدونة' : 'Back to Blog' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
