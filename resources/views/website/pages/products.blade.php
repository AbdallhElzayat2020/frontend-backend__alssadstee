@extends('website.layouts.master')

@section('title', 'Products')
@section('content')
    <!-- Page Header - Light -->
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">{{ __('products.title') }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('products.title') }}</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Products Section    -->
    <section id="products" class="py-5 products-page">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('products.title') }}</h2>
            </div>

            <div class="row g-4">
                @forelse ($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="product-card-link text-decoration-none d-block h-100">
                            <div class="card shadow-sm border-0 overflow-hidden product-card h-100">
                                <div class="product-card-image">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->getTranslation('name', app()->getLocale()) }}">
                                    @else
                                        <img src="{{ asset('assets/website/images/product_2.png') }}" alt="product">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h3 class="product-title mb-2">
                                        {{ $product->getTranslation('name', app()->getLocale()) }}
                                    </h3>
                                    @php
                                        $description = $product->getTranslation('description', app()->getLocale());
                                    @endphp
                                    @if ($description)
                                        <p class="text-muted mb-0 product-desc-preview">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($description), 120) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <p class="text-muted">{{ __('products.empty_state') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if (method_exists($products, 'links'))
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </section>
    <!-- Projects Section -->

@endsection
