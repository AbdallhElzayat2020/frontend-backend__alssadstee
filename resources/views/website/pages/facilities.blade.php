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
    <section class="facilities-content-section py-5">
        <div class="container">
            <p class="facilities-intro mb-5">{{ __('facilities.intro') }}</p>

            <div class="row g-4">
                <!-- مرافق الإنتاج -->
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600">
                        <div class="facilities-card-icon"><i class="fas fa-industry"></i></div>
                        <h3 class="facilities-card-title">{{ __('facilities.production_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('facilities.production_1') }}</li>
                            <li>{{ __('facilities.production_2') }}</li>
                            <li>{{ __('facilities.production_3') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- مختبرات الجودة -->
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                        <div class="facilities-card-icon"><i class="fas fa-flask"></i></div>
                        <h3 class="facilities-card-title">{{ __('facilities.labs_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('facilities.labs_1') }}</li>
                            <li>{{ __('facilities.labs_2') }}</li>
                            <li>{{ __('facilities.labs_3') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- الخدمات اللوجستية -->
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="facilities-card-icon"><i class="fas fa-truck"></i></div>
                        <h3 class="facilities-card-title">{{ __('facilities.logistics_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('facilities.logistics_1') }}</li>
                            <li>{{ __('facilities.logistics_2') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- خدمة العملاء -->
                <div class="col-md-6 col-lg-3">
                    <div class="facilities-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                        <div class="facilities-card-icon"><i class="fas fa-headset"></i></div>
                        <h3 class="facilities-card-title">{{ __('facilities.customer_title') }}</h3>
                        <ul class="facilities-card-list">
                            <li>{{ __('facilities.customer_1') }}</li>
                            <li>{{ __('facilities.customer_2') }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Images Grid -->
            <div class="row g-4 mt-5" id="facilitiesGallery">
                <div class="col-md-6">
                    <div class="facilities-image-item media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_1.jpeg') }}"
                        data-title="{{ __('facilities.image_1_title') }}" data-index="0">
                        <div class="about-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_1.jpeg') }}"
                                alt="{{ __('facilities.image_1_title') }}" class="img-fluid rounded-3" />
                            <div class="facilities-image-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="facilities-image-item media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_2.jpeg') }}"
                        data-title="{{ __('facilities.image_2_title') }}" data-index="1">
                        <div class="about-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_2.jpeg') }}"
                                alt="{{ __('facilities.image_2_title') }}" class="img-fluid rounded-3" />
                            <div class="facilities-image-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="facilities-image-item media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_3.jpeg') }}"
                        data-title="{{ __('facilities.image_3_title') }}" data-index="2">
                        <div class="about-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_3.jpeg') }}"
                                alt="{{ __('facilities.image_3_title') }}" class="img-fluid rounded-3" />
                            <div class="facilities-image-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="facilities-image-item media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_4.jpeg') }}"
                        data-title="{{ __('facilities.image_4_title') }}" data-index="3">
                        <div class="about-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_4.jpeg') }}"
                                alt="{{ __('facilities.image_4_title') }}" class="img-fluid rounded-3" />
                            <div class="facilities-image-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="imageModalLabel">{{ __('facilities.modal_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 position-relative">
                    <button class="modal-nav-btn modal-nav-prev" id="prevImage"
                        aria-label="{{ __('media.gallery_prev_image') }}">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <img id="modalImage" src="" alt="" class="img-fluid w-100" />
                    <button class="modal-nav-btn modal-nav-next" id="nextImage"
                        aria-label="{{ __('media.gallery_next_image') }}">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
