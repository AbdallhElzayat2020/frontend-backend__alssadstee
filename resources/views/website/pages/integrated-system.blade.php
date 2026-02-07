@extends('website.layouts.master')
@section('title', 'Integrated System')

@section('content')
    <!-- Integrated System Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('integrated-system.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- IMS Introduction -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6 order-lg-2">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.ims_title') }}</h2>
                    <p class="about-section-text mb-0">{{ __('integrated-system.ims_description') }}</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about-image-wrapper">
                        <img src="{{ asset('assets/website/images/about_section_1.jpg') }}" alt="نظام الإدارة المتكامل"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IMS Standards - Cards -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <h3 class="about-section-title mb-4 text-center">{{ __('integrated-system.ims_includes') }}</h3>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600">
                        <div class="facilities-card-icon"><i class="fas fa-certificate"></i></div>
                        <h3 class="facilities-card-title">{{ __('integrated-system.qms_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('integrated-system.qms_1') }}</li>
                            <li>{{ __('integrated-system.qms_2') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                        <div class="facilities-card-icon"><i class="fas fa-hard-hat"></i></div>
                        <h3 class="facilities-card-title">{{ __('integrated-system.sms_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('integrated-system.sms_1') }}</li>
                            <li>{{ __('integrated-system.sms_2') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="facilities-card-icon"><i class="fas fa-leaf"></i></div>
                        <h3 class="facilities-card-title">{{ __('integrated-system.ems_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('integrated-system.ems_1') }}</li>
                            <li>{{ __('integrated-system.ems_2') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                        <div class="facilities-card-icon"><i class="fas fa-bolt"></i></div>
                        <h3 class="facilities-card-title">{{ __('integrated-system.enms_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('integrated-system.enms_1') }}</li>
                            <li>{{ __('integrated-system.enms_2') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p class="about-section-text text-center mt-5 mb-0">{{ __('integrated-system.ims_closing') }}</p>
        </div>
    </section>
@endsection
