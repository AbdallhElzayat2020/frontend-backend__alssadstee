@extends('website.layouts.master')

@section('title', 'Quality')

@section('content')
    <!-- Quality Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('quality.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- Quality Intro - Elegant Center -->
    <section class="quality-hero-section">
        <div class="container">
            <div class="quality-hero-content">
                <div class="quality-hero-accent"></div>
                <p class="quality-hero-text">{{ __('quality.intro') }}</p>
            </div>
        </div>
    </section>

    <!-- Quality Cards - Premium Design -->
    <section class="quality-cards-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="quality-premium-card" data-aos="fade-up" data-aos-duration="600">
                        <div class="quality-card-border-accent"></div>
                        <div class="quality-card-icon-wrap">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="quality-card-title">{{ __('quality.certifications_title') }}</h3>
                        <ul class="quality-card-list">
                            <li>{{ __('quality.cert_1') }}</li>
                            <li>{{ __('quality.cert_2') }}</li>
                            <li>{{ __('quality.cert_3') }}</li>
                            <li>{{ __('quality.cert_4') }}</li>
                            <li>{{ __('quality.cert_5') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="quality-premium-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                        <div class="quality-card-border-accent"></div>
                        <div class="quality-card-icon-wrap">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="quality-card-title">{{ __('quality.methodology_title') }}</h3>
                        <ul class="quality-card-list">
                            <li>{{ __('quality.methodology_1') }}</li>
                            <li>{{ __('quality.methodology_2') }}</li>
                            <li>{{ __('quality.methodology_3') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="quality-premium-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="quality-card-border-accent"></div>
                        <div class="quality-card-icon-wrap">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="quality-card-title">{{ __('quality.excellence_title') }}</h3>
                        <ul class="quality-card-list">
                            <li>{{ __('quality.excellence_1') }}</li>
                            <li>{{ __('quality.excellence_2') }}</li>
                            <li>{{ __('quality.excellence_3') }}</li>
                            <li>{{ __('quality.excellence_4') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
