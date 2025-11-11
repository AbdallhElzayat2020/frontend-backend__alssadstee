@extends('website.layouts.master')
@section('title', 'Facilities')
@section('content')
    <!-- Facilities Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('facilities.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- Facilities Content Section -->
    <section class="about-content-section facilities-content-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <h2 class="about-section-title mb-1">
                        {{ __('facilities.title') }}
                    </h2>
                </div>
            </div>

            <!-- Images Grid -->
            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_1.jpg')}}"
                            alt="عامل يستخدم آلة قطع مع شرارات" class="img-fluid rounded-3" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_2.jpg')}}" alt="عامل يعمل على أنابيب معدنية"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_3.jpg')}}"
                            alt="عامل يستخدم آلة طحن مع شرارات" class="img-fluid rounded-3" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_4.jpg')}}" alt="يد عامل مع آلة قطع وشرارات"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <p class="about-section-text mb-4">
                        {!! __('facilities.content') !!}
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
