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

    <!-- Section 1: Introduction -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-2">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.ims_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('integrated-system.ims_description') }}
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_1.jpg')}}" alt="نظام الإدارة المتكامل"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Quality Management System -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.qms_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('integrated-system.qms_description') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_2.jpg')}}" alt="نظام إدارة الجودة"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Environmental Management System -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-2">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.ems_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('integrated-system.ems_description') }}
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_3.jpg')}}" alt="نظام إدارة البيئة"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 4: Safety Management System -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.sms_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('integrated-system.sms_description') }}
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_4.jpg')}}" alt="نظام إدارة السلامة"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Energy Management System -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6 order-md-2">
                    <h2 class="about-section-title mb-4">{{ __('integrated-system.enms_title') }}</h2>
                    <p class="about-section-text">
                        {{ __('integrated-system.enms_description') }}
                    </p>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_1.jpg')}}" alt="نظام إدارة الطاقة"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
