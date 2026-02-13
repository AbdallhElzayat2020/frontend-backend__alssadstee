@extends('website.layouts.master')
@section('title', 'home')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <video playsinline autoplay muted loop id="bgVideo">
            <source src="{{asset('assets/website/images/video_banner.mp4')}}" type="video/mp4" />
            {{ __('home.hero_video_not_supported') }}
        </video>

        <div class="overlay-dark"></div>

        <div class="hero-content text-white">
            <div class="container">
                <h5 class="mb-3">{{ __('home.hero_welcome') }}</h5>
                <h1 class="display-4 fw-bold mb-4">
                    {{ __('home.hero_company_name') }}
                </h1>
                <p class="lead mb-4 ">
                    {{ __('home.hero_description') }}
                </p>
                <a href="#about" class="btn btn-primary btn-lg rounded-4">{{ __('home.hero_more_about') }}</a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-3">{{ __('home.about_title') }}</h3>
                    <p class="text-intro mt-2">
                        {{ __('home.about_description_1') }}
                    </p>
                    <p class="text-intro mt-2">
                        {{ __('home.about_description_2') }}
                    </p>
                    <p class="text-intro mt-2">
                        {{ __('home.about_description_3') }}
                    </p>
                    <a href="{{ route('products') }}"
                        class="btn btn-outline-primary mt-3">{{ __('home.about_discover_products') }}</a>
                </div>
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <img src="{{asset('assets/website/images/about_us.jpeg')}}" class="img-fluid" alt="عمال في المصنع"
                            data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" />
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Quality Section -->
    <section id="quality" class="py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card shadow-sm border-0 overflow-hidden">
                        <img src="{{asset('assets/website/images/quality_page.jpeg')}}" class="img-fluid" alt="ع"
                            data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" />
                    </div>
                </div>

                <div class="col-md-6">
                    <h2 class="mb-3 text-white quality-title">{{ __('home.quality_title') }}</h2>
                    <p class="text-white mt-2 quality-text">
                        {{ __('home.quality_description') }}
                    </p>

                    <a href="{{ route('products') }}"
                        class="btn btn-outline-light mt-3">{{ __('home.quality_discover_products') }}</a>
                </div>

            </div>
        </div>
    </section>


    <!-- Certificates Section -->
    <section id="certificates" class="certificates-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('home.certificates_title') }}
                </h2>
                <p class="section-subtitle">
                    {{ __('home.certificates_subtitle') }}
                </p>
            </div>

            <div id="certificatesCarousel" class="carousel slide certificate-carousel" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-4">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_1.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 1" />
                                </div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_2.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 2" />
                                </div>
                            </div>
                            <div class="col-md-4 d-none d-lg-block">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_3.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 3" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row g-4 justify-content-center">
                            <div class="col-md-4">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_4.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 4" />
                                </div>
                            </div>
                            <div class="col-md-4 d-none d-md-block">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_1.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 1" />
                                </div>
                            </div>
                            <div class="col-md-4 d-none d-lg-block">
                                <div class="certificate-card p-3" data-aos="fade-up"
                                    data-aos-anchor-placement="bottom-bottom">
                                    <img src="{{asset('assets/website/images/slider_2.jpg')}}"
                                        class="img-fluid certificate-img" alt="شهادة الجودة 2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#certificatesCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('home.certificates_prev') }}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#certificatesCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('home.certificates_next') }}</span>
                </button>

                <div class="carousel-indicators position-static mt-4">
                    <button type="button" data-bs-target="#certificatesCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="{{ __('home.certificates_slide_1') }}"></button>
                    <button type="button" data-bs-target="#certificatesCarousel" data-bs-slide-to="1"
                        aria-label="{{ __('home.certificates_slide_2') }}"></button>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->


    <!-- Products Section    -->
    <section id="products" class="py-5 light_background">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">{{ __('home.products_title') }}</h2>
            </div>

            <div class="row g-4">
                @forelse ($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('products.show', $product->slug) }}"
                            class="product-card-link text-decoration-none d-block h-100">
                            <div class="card shadow-sm border-0 overflow-hidden product-card h-100">
                                <div class="product-card-image">
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}"
                                            alt="{{ $product->getTranslation('name', app()->getLocale()) }}">
                                    @else
                                        <img src="{{ asset('assets/website/images/product_2.png') }}" alt="product">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h3 class="product-title mb-2">
                                        {{ $product->getTranslation('name', app()->getLocale()) }}
                                    </h3>
                                    @php
                                        $description = $product->getTranslation('description', app()->getLocale());
                                    @endphp
                                    @if ($description)
                                        <p class="text-muted mb-0 product-desc-preview">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($description), 120) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <p class="text-muted">{{ __('products.empty_state') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
            @if ($products->count() >= 3)
                <div class="text-center mt-4">
                    <a href="{{ route('products') }}" class="btn btn-primary">{{ __('home.products_view_all') }}</a>
                </div>
            @endif
        </div>
    </section>
    <!-- Projects Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Left Column: Map and Contact Info -->
                <div class="col-lg-6">
                    <div class="map-container mb-4 rounded-3 overflow-hidden shadow-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3628.56279777618!2d46.8713652!3d24.5697661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f99056eba0d57%3A0x31bc164e0f7cfb6f!2sAlssad%20Steel%20For%20Industry%20Co.!5e0!3m2!1sen!2s!4v1770722180075!5m2!1sen!2s"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="contact-info text-dark">
                        <p class="mb-2"><strong>{{ __('home.contact_email') }}</strong> info@alssadsteel.com</p>
                        <p class="mb-2"><strong>{{ __('home.contact_phone') }}</strong> 0114997471</p>
                        <p class="mb-0"><strong>{{ __('home.contact_address') }}</strong> Saudi Arabia | Riyadh | 2nd
                            Industrial City</p>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-form-card p-4 p-lg-5 rounded-4 shadow-lg">
                        <h2 class="contact-title mb-4">{{ __('home.contact_title') }}</h2>

                        <form class="contact-form" action="{{ route('contact-us.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="homeContactName" class="form-label">{{ __('home.contact_name') }}</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    id="homeContactName" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('home.contact_name_placeholder') }}" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="homeContactEmail"
                                    class="form-label">{{ __('home.contact_email_label') }}</label>
                                <input type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    id="homeContactEmail" name="email" value="{{ old('email') }}"
                                    placeholder="your@email.com" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="homeContactPhone"
                                    class="form-label">{{ __('home.contact_phone_label') }}</label>
                                <input type="tel" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                    id="homeContactPhone" name="phone" value="{{ old('phone') }}"
                                    placeholder="05xxxxxxxx" />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="homeContactMessage" class="form-label">{{ __('home.contact_message') }}</label>
                                <textarea class="form-control form-control-lg @error('message') is-invalid @enderror"
                                    id="homeContactMessage" name="message" rows="5"
                                    placeholder="{{ __('home.contact_message_placeholder') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3">
                                <i class="fas fa-paper-plane me-2"></i>
                                {{ __('home.contact_send') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
