@extends('website.layouts.master')

@section('title', 'about')
@section('content')
    <!-- About Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('about.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-2">
                    <h2 class="about-section-title mb-4">{{ __('about.story_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('about.story_description') }}
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_1.jpg')}}" alt="عامل يستخدم آلة قطع"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Vision Section -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h2 class="about-section-title mb-4">{{ __('about.vision_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('about.vision_description') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_2.jpg')}}" alt="عامل يعمل على أنبوب معدني"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-2">
                    <h2 class="about-section-title mb-4">{{ __('about.values_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('about.values_description') }}
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_3.jpg')}}" alt="عامل يعمل على هيكل معدني"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
