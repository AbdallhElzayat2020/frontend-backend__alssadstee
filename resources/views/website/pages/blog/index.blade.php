@extends('website.layouts.master')
@section('title', app()->getLocale() === 'ar' ? 'المدونة' : 'Blog')

@section('content')
    {{-- Page Header --}}
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    @isset($category)
                        <li class="breadcrumb-item">
                            <a href="{{ route('blog.index') }}">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $category->getTranslation('name', app()->getLocale()) }}
                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}
                        </li>
                    @endisset
                </ol>
            </nav>
        </div>
    </section>

    {{-- Blog Section --}}
    <section class="blog-page-section py-5">
        <div class="container">
            <div class="row g-5">

                {{-- ===== Main Posts Grid ===== --}}
                <div class="col-lg-8">
                    @if ($blogs->count() > 0)
                        <div class="row g-4">
                            @foreach ($blogs as $blog)
                                <div class="col-md-6" data-aos="fade-up">
                                    <article class="blog-card h-100">
                                        {{-- Image --}}
                                        @if ($blog->image)
                                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card-img-wrap">
                                                <img src="{{ asset($blog->image) }}"
                                                     alt="{{ $blog->getTranslation('title', app()->getLocale()) }}"
                                                     class="blog-card-img">
                                                @if ($blog->category)
                                                    <span class="blog-card-category-badge">
                                                        {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                                    </span>
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card-img-wrap blog-card-img-placeholder">
                                                <i class="fa fa-newspaper fa-3x text-muted"></i>
                                                @if ($blog->category)
                                                    <span class="blog-card-category-badge">
                                                        {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                                    </span>
                                                @endif
                                            </a>
                                        @endif

                                        {{-- Body --}}
                                        <div class="blog-card-body">
                                            {{-- Meta --}}
                                            <div class="blog-card-meta">
                                                <span class="blog-card-meta-item">
                                                    <i class="fa fa-clock"></i>
                                                    {{ $blog->created_at->format('M d, Y') }}
                                                </span>
                                                @if ($blog->category)
                                                    <span class="blog-card-meta-separator">•</span>
                                                    <span class="blog-card-meta-item">
                                                        <i class="fa fa-folder-open"></i>
                                                        {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- Title --}}
                                            <h2 class="blog-card-title">
                                                <a href="{{ route('blog.show', $blog->slug) }}">
                                                    {{ $blog->getTranslation('title', app()->getLocale()) }}
                                                </a>
                                            </h2>

                                            {{-- Excerpt --}}
                                            <p class="blog-card-excerpt">
                                                {{ Str::limit(strip_tags($blog->getTranslation('short_description', app()->getLocale())), 130) }}
                                            </p>

                                            {{-- Read More --}}
                                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog-card-readmore">
                                                {{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                                                <i class="fa fa-arrow-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                                            </a>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-5">
                            {{ $blogs->links() }}
                        </div>
                    @else
                        <div class="blog-empty-state">
                            <i class="fa fa-newspaper fa-3x mb-3 text-muted"></i>
                            <p>{{ app()->getLocale() === 'ar' ? 'لا توجد مقالات بعد.' : 'No blog posts found.' }}</p>
                            @if(request()->filled('q'))
                                <a href="{{ isset($category) ? route('blog.category', $category->slug) : route('blog.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                    {{ app()->getLocale() === 'ar' ? 'مسح البحث' : 'Clear search' }}
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- ===== Sidebar ===== --}}
                <div class="col-lg-4">

                    {{-- Search Widget --}}
                    <div class="blog-sidebar-widget" data-aos="fade-up">
                        <h3 class="blog-sidebar-title">
                            {{ app()->getLocale() === 'ar' ? 'بحث' : 'Search' }}
                        </h3>
                        <form method="GET"
                              action="{{ isset($category) ? route('blog.category', $category->slug) : route('blog.index') }}"
                              class="blog-search-form">
                            <input type="text" name="q" value="{{ request('q') }}"
                                   placeholder="{{ app()->getLocale() === 'ar' ? 'ابحث هنا...' : 'Search...' }}"
                                   class="blog-search-input">
                            <button type="submit" class="blog-search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

                    {{-- Categories Widget --}}
                    @if ($categories->count() > 0)
                        <div class="blog-sidebar-widget" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="blog-sidebar-title">
                                {{ app()->getLocale() === 'ar' ? 'الفئات' : 'Category' }}
                            </h3>
                            <ul class="blog-category-list">
                                <li>
                                    <a href="{{ route('blog.index') }}"
                                       class="blog-category-item {{ !isset($category) && !request('q') ? 'active' : '' }}">
                                        <span class="blog-category-check"><i class="fa fa-check-circle"></i></span>
                                        <span class="blog-category-name">
                                            {{ app()->getLocale() === 'ar' ? 'كل الفئات' : 'All Categories' }}
                                        </span>
                                    </a>
                                </li>
                                @foreach ($categories as $cat)
                                    <li>
                                        <a href="{{ route('blog.category', $cat->slug) }}"
                                           class="blog-category-item {{ isset($category) && $category->id === $cat->id ? 'active' : '' }}">
                                            <span class="blog-category-check"><i class="fa fa-check-circle"></i></span>
                                            <span class="blog-category-name">
                                                {{ $cat->getTranslation('name', app()->getLocale()) }}
                                            </span>
                                            @if($cat->blogs_count > 0)
                                                <span class="blog-category-count">{{ $cat->blogs_count }}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
