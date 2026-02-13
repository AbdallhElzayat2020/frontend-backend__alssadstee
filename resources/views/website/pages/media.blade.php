@extends('website.layouts.master')

@section('title', 'Media')

@section('content')
    <!-- Media Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('media.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- Media Gallery Section -->
    <section class="media-gallery-section py-5">
        <div class="container">
            <div class="row g-4" id="mediaGallery">

                <!-- Image 1 -->
                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_1.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 1]) }}" data-index="0">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_1.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_2.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 1]) }}" data-index="0">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_2.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_3.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 1]) }}" data-index="0">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_3.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_4.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 1]) }}" data-index="0">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_4.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image 1 -->
                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_5.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 1]) }}" data-index="0">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_5.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_6.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 2]) }}" data-index="1">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_6.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_7.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 2]) }}" data-index="1">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_7.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_8.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 2]) }}" data-index="1">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_8.jpeg') }}"
                                alt="{{ __('media.gallery_gallery_alt') }}" class="img-fluid" />
                            <div class="media-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="media-gallery-item" data-bs-toggle="modal" data-bs-target="#imageModal"
                        data-image="{{ asset('assets/website/images/gallery_9.jpeg') }}"
                        data-title="{{ __('media.gallery_image_title', ['index' => 2]) }}" data-index="1">
                        <div class="media-image-wrapper">
                            <img src="{{ asset('assets/website/images/gallery_9.jpeg') }}" alt="{{ __('media.gallery_gallery_alt') }}"
                                class="img-fluid" />
                            <div class="media-overlay">
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
                    <h5 class="modal-title" id="imageModalLabel">{{ __('media.gallery_modal_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 position-relative">
                    <button class="modal-nav-btn modal-nav-prev" id="prevImage"
                        aria-label="{{ __('media.gallery_prev_image') }}">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <img id="modalImage" src="" alt="{{ __('media.gallery_gallery_alt') }}"
                        class="img-fluid w-100" />
                    <button class="modal-nav-btn modal-nav-next" id="nextImage"
                        aria-label="{{ __('media.gallery_next_image') }}">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
