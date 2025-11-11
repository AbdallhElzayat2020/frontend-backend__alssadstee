@extends('website.layouts.master')

@section('title', 'Products')
@section('content')
    <!-- About Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('products.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- Products Section    -->
    <section id="products" class="py-5 light_background">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('products.title') }}</h2>
            </div>

            <div class="row align-items-center">

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 overflow-hidden p-3 product-card">
                        <img src="{{asset('assets/website/images/product_2.png')}}" class="img-fluid"
                            alt="عمال في المصنع" />
                        <a href="#" class="product-link">
                            <h3 class="product-title">
                                {{ __('products.circular_bar') }}
                            </h3>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 overflow-hidden p-3 product-card">
                        <img src="{{asset('assets/website/images/product_2.png')}}" class="img-fluid"
                            alt="عمال في المصنع" />
                        <a href="#" class="product-link">
                            <h3 class="product-title">
                                {{ __('products.circular_bar') }}
                            </h3>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 overflow-hidden p-3 product-card">
                        <img src="{{asset('assets/website/images/product_2.png')}}" class="img-fluid"
                            alt="عمال في المصنع" />
                        <a href="#" class="product-link">
                            <h3 class="product-title"> شريط دائري </h3>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Projects Section -->

@endsection
