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

    <!-- Quality Content Section -->
    <section class="about-content-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h2 class="about-section-title mb-4">{{ __('quality.commitment_title') }}</h2>
                    <p class="about-section-text mb-4">
                        {{ __('quality.commitment_description_1') }}
                    </p>
                    <p class="about-section-text mb-4">
                        {{ __('quality.commitment_description_2') }}
                    </p>

                    <h3 class="about-section-title mb-4 mt-5">{{ __('quality.how_we_achieve_title') }}</h3>
                    <ul class="quality-list">
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item1') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item2') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item3') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item4') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item5') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item6') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item7') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item8') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item9') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item10') }}
                        </li>
                        <li class="quality-list-item">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ __('quality.how_we_achieve_item11') }}
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="quality-image-wrapper">
                        <img src="{{asset('assets/website/images/about_section_2.jpg')}}" alt="الجودة والمعايير"
                            class="img-fluid rounded-3" />
                    </div>
                    <div class="quality-standards-card mt-4 p-4 rounded-3">
                        <h4 class="mb-3">{{ __('quality.standards_title') }}</h4>
                        <div class="standard-item mb-3">
                            <i class="fas fa-certificate text-primary me-2"></i>
                            <strong>ISO 14001</strong> - {{ __('quality.standards_iso14001') }}
                        </div>
                        <div class="standard-item mb-3">
                            <i class="fas fa-certificate text-primary me-2"></i>
                            <strong>ISO 45001</strong> - {{ __('quality.standards_iso45001') }}
                        </div>
                        <div class="standard-item mb-3">
                            <i class="fas fa-certificate text-primary me-2"></i>
                            <strong>ISO 50001</strong> - {{ __('quality.standards_iso50001') }}
                        </div>
                        <div class="standard-item">
                            <i class="fas fa-certificate text-primary me-2"></i>
                            <strong>ISO 9001</strong> - {{ __('quality.standards_iso9001') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
