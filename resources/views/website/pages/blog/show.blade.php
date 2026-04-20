@extends('website.layouts.master')
@section('title', $blog->getTranslation('title', app()->getLocale()))

@section('content')
    {{-- Page Header --}}
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">
                {{ Str::limit($blog->getTranslation('title', app()->getLocale()), 60) }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('blog.index') }}">{{ app()->getLocale() === 'ar' ? 'المدونة' : 'Blog' }}</a>
                    </li>
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

    {{-- Blog Detail Section --}}
    <section class="blog-page-section py-5">
        <div class="container">
            <div class="row g-5">

                {{-- ===== Main Article ===== --}}
                <div class="col-lg-8">
                    <article class="blog-detail-article">

                        {{-- Featured Image --}}
                        @if ($blog->image)
                            <div class="blog-detail-img-wrap">
                                <img src="{{ asset($blog->image) }}"
                                     alt="{{ $blog->getTranslation('title', app()->getLocale()) }}"
                                     class="blog-detail-img">
                                @if ($blog->category)
                                    <span class="blog-card-category-badge">
                                        {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        {{-- Meta --}}
                        <div class="blog-detail-meta">
                            <span class="blog-card-meta-item">
                                <i class="fa fa-clock"></i>
                                {{ $blog->created_at->translatedFormat('d F Y') }}
                            </span>
                            @if ($blog->category)
                                <span class="blog-card-meta-separator">•</span>
                                <a href="{{ route('blog.category', $blog->category->slug) }}"
                                   class="blog-card-meta-item blog-detail-meta-link">
                                    <i class="fa fa-folder-open"></i>
                                    {{ $blog->category->getTranslation('name', app()->getLocale()) }}
                                </a>
                            @endif
                        </div>

                        {{-- Title --}}
                        <h1 class="blog-detail-title">
                            {{ $blog->getTranslation('title', app()->getLocale()) }}
                        </h1>

                        {{-- Lead / Short Description --}}
                        @if ($blog->getTranslation('short_description', app()->getLocale()))
                            <div class="blog-detail-lead">
                                {!! $blog->getTranslation('short_description', app()->getLocale()) !!}
                            </div>
                        @endif

                        {{-- Full Content --}}
                        <div class="blog-detail-content">
                            {!! $blog->getTranslation('description', app()->getLocale()) !!}
                        </div>

                        {{-- Back Button --}}
                        <div class="blog-detail-footer">
                            <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }} me-2"></i>
                                {{ app()->getLocale() === 'ar' ? 'العودة إلى المدونة' : 'Back to Blog' }}
                            </a>
                        </div>
                    </article>

                    {{-- Related Posts --}}
                    @if ($relatedBlogs->count() > 0)
                        <div class="blog-related mt-5">
                            <h3 class="blog-related-title">
                                {{ app()->getLocale() === 'ar' ? 'مقالات ذات صلة' : 'Related Posts' }}
                            </h3>
                            <div class="row g-4">
                                @foreach ($relatedBlogs as $related)
                                    <div class="col-md-4">
                                        <article class="blog-card h-100">
                                            @if ($related->image)
                                                <a href="{{ route('blog.show', $related->slug) }}" class="blog-card-img-wrap">
                                                    <img src="{{ asset($related->image) }}"
                                                         alt="{{ $related->getTranslation('title', app()->getLocale()) }}"
                                                         class="blog-card-img">
                                                </a>
                                            @endif
                                            <div class="blog-card-body">
                                                <div class="blog-card-meta">
                                                    <span class="blog-card-meta-item">
                                                        <i class="fa fa-clock"></i>
                                                        {{ $related->created_at->format('M d, Y') }}
                                                    </span>
                                                </div>
                                                <h2 class="blog-card-title" style="font-size: 1rem;">
                                                    <a href="{{ route('blog.show', $related->slug) }}">
                                                        {{ Str::limit($related->getTranslation('title', app()->getLocale()), 70) }}
                                                    </a>
                                                </h2>
                                                <a href="{{ route('blog.show', $related->slug) }}" class="blog-card-readmore" style="font-size: 0.85rem;">
                                                    {{ app()->getLocale() === 'ar' ? 'اقرأ المزيد' : 'Read More' }}
                                                    <i class="fa fa-arrow-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
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
                        <form method="GET" action="{{ route('blog.index') }}" class="blog-search-form">
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
                                    <a href="{{ route('blog.index') }}" class="blog-category-item">
                                        <span class="blog-category-check"><i class="fa fa-check-circle"></i></span>
                                        <span class="blog-category-name">
                                            {{ app()->getLocale() === 'ar' ? 'كل الفئات' : 'All Categories' }}
                                        </span>
                                    </a>
                                </li>
                                @foreach ($categories as $cat)
                                    <li>
                                        <a href="{{ route('blog.category', $cat->slug) }}"
                                           class="blog-category-item {{ $blog->blog_category_id === $cat->id ? 'active' : '' }}">
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

                    {{-- Recent Posts Widget --}}
                    @if ($recentBlogs->count() > 0)
                        <div class="blog-sidebar-widget" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="blog-sidebar-title">
                                {{ app()->getLocale() === 'ar' ? 'أحدث المقالات' : 'Recent Posts' }}
                            </h3>
                            <ul class="blog-recent-list">
                                @foreach ($recentBlogs as $recent)
                                    <li class="blog-recent-item">
                                        @if ($recent->image)
                                            <a href="{{ route('blog.show', $recent->slug) }}" class="blog-recent-img-wrap">
                                                <img src="{{ asset($recent->image) }}"
                                                     alt="{{ $recent->getTranslation('title', app()->getLocale()) }}"
                                                     class="blog-recent-img">
                                            </a>
                                        @endif
                                        <div class="blog-recent-info">
                                            <a href="{{ route('blog.show', $recent->slug) }}" class="blog-recent-title">
                                                {{ Str::limit($recent->getTranslation('title', app()->getLocale()), 55) }}
                                            </a>
                                            <span class="blog-recent-date">
                                                <i class="fa fa-clock me-1"></i>
                                                {{ $recent->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
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
