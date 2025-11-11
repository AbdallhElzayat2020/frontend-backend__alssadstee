@extends('website.layouts.master')

@section('title', $product->getTranslation('name', app()->getLocale()))
@section('content')
    <!-- Product Header - Light -->
    <section class="page-header-light py-4">
        <div class="container">
            <h1 class="page-title mb-1">
                {{ $product->getTranslation('name', app()->getLocale()) }}
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') ?? 'Home' }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __('products.title') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $product->getTranslation('name', app()->getLocale()) }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Product Details -->
    <section class="py-5 product-details products-page">
        <div class="container">
            <div class="row gy-4 align-items-start">
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 overflow-hidden rounded-4 product-image-card">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid"
                                alt="{{ $product->getTranslation('name', app()->getLocale()) }}">
                        @else
                            <img src="{{ asset('assets/website/images/product_2.png') }}" class="img-fluid" alt="product">
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-2 p-lg-0 product-content">
                        <h2 class="mb-3 product-title">{{ $product->getTranslation('name', app()->getLocale()) }}</h2>
                        @php
                            $description = $product->getTranslation('description', app()->getLocale());
                        @endphp
                        @if ($description)
                            <p class="lead text-muted product-description">{{ $description }}</p>
                        @endif

                        <div class="d-flex gap-2 mt-4">
                            <a href="{{ route('products') }}" class="btn btn-light">
                                {{ __('home.products_view_all') }}
                            </a>
                            <a href="{{ route('quote') }}" class="btn btn-primary">
                                {{ __('quote.title') ?? 'Request' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
