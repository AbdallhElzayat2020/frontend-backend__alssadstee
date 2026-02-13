@extends('website.layouts.master')

@section('title', 'about')
@section('content')
    <!-- About Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <p class="about-header-welcome">{{ __('about.header_welcome') }}</p>
                <h1 class="about-page-title">{{ __('about.title') }}</h1>
                <p class="about-header-tagline">{{ __('about.header_tagline') }}</p>
            </div>
        </div>
    </section>

    <!-- Our Story Section - WOW Design -->
    <section class="about-story-hero">
        <div class="about-story-bg">
            <img src="{{ asset('assets/website/images/about_section_1.jpg') }}" alt="عامل يستخدم آلة قطع" />
            <div class="about-story-bg-overlay"></div>
        </div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-75 py-5">
                <div class="col-lg-6 order-lg-2">
                    <div class="about-story-card wow-card" data-aos="fade-left" data-aos-duration="900" data-aos-once="true">
                        <div class="wow-card-glow"></div>
                        <div class="about-story-card-inner">
                            <span class="about-story-badge" data-aos="fade-down" data-aos-delay="100" data-aos-duration="600">{{ __('about.story_title') }}</span>
                            <h2 class="about-story-hero-title" data-aos="fade-up" data-aos-delay="150" data-aos-duration="600">{{ __('about.story_title') }}</h2>
                            <div class="about-story-accent" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600"></div>
                            <p class="about-story-hero-text" data-aos="fade-up" data-aos-delay="250" data-aos-duration="600">{{ __('about.story_description_1') }}</p>
                            <p class="about-story-hero-text" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">{{ __('about.story_description_2') }}</p>
                            <p class="about-story-hero-text" data-aos="fade-up" data-aos-delay="350" data-aos-duration="600">{{ __('about.story_description_3') }}</p>
                            <div class="about-story-divider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600"></div>
                            <h3 class="about-story-subtitle" data-aos="fade-up" data-aos-delay="450" data-aos-duration="600">{{ __('about.distinction_title') }}</h3>
                            <ul class="about-story-wow-list">
                                <li data-aos="fade-up" data-aos-delay="500" data-aos-duration="500"><i class="fas fa-check-circle"></i><span>{{ __('about.distinction_1') }}</span></li>
                                <li data-aos="fade-up" data-aos-delay="550" data-aos-duration="500"><i class="fas fa-check-circle"></i><span>{{ __('about.distinction_2') }}</span></li>
                                <li data-aos="fade-up" data-aos-delay="600" data-aos-duration="500"><i class="fas fa-check-circle"></i><span>{{ __('about.distinction_3') }}</span></li>
                                <li data-aos="fade-up" data-aos-delay="650" data-aos-duration="500"><i class="fas fa-check-circle"></i><span>{{ __('about.distinction_4') }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about-story-stats" data-aos="fade-right" data-aos-duration="900" data-aos-once="true">
                        <div class="about-story-stat-item">
                            <div class="about-story-stat-icon"><i class="fas fa-certificate"></i></div>
                            <span class="about-story-stat-label">{{ __('about.stat_iso') }}</span>
                        </div>

                        <div class="about-story-stat-item">
                            <div class="about-story-stat-icon"><i class="fas fa-check-double"></i></div>
                            <span class="about-story-stat-num"></span>
                            <span class="about-story-stat-label">{{ __('about.stat_saso') }}</span>
                        </div>
                        <div class="about-story-stat-item">
                            <div class="about-story-stat-icon"><i class="fas fa-shield-alt"></i></div>
                            <span class="about-story-stat-label">{{ __('about.stat_quality_desc') }}</span>
                        </div>
                        <div class="about-story-stat-item">
                            <div class="about-story-stat-icon"><i class="fas fa-hard-hat"></i></div>
                            <span class="about-story-stat-label">{{ __('about.stat_safety_desc') }}</span>
                        </div>
                        <div class="about-story-stat-item">
                            <div class="about-story-stat-icon"><i class="fas fa-leaf"></i></div>
                            <span class="about-story-stat-label">{{ __('about.stat_sustainability_desc') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission - Icon Boxes -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="about-icon-box">
                        <div class="about-icon-box-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="about-icon-box-title">{{ __('about.vision_title') }}</h3>
                        <p class="about-icon-box-text">{{ __('about.vision_description') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-icon-box">
                        <div class="about-icon-box-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="about-icon-box-title">{{ __('about.mission_title') }}</h3>
                        <p class="about-icon-box-text">{{ __('about.mission_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="about-content-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h2 class="about-section-title mb-4">{{ __('about.values_title') }}</h2>
                    <ul class="about-values-list">
                        <li>
                            <strong>{{ __('about.value_1_title') }}:</strong>
                            {{ __('about.value_1_desc') }}
                        </li>
                        <li>
                            <strong>{{ __('about.value_2_title') }}:</strong>
                            {{ __('about.value_2_desc') }}
                        </li>
                        <li>
                            <strong>{{ __('about.value_3_title') }}:</strong>
                            {{ __('about.value_3_desc') }}
                        </li>
                        <li>
                            <strong>{{ __('about.value_4_title') }}:</strong>
                            {{ __('about.value_4_desc') }}
                        </li>
                        <li>
                            <strong>{{ __('about.value_5_title') }}:</strong>
                            {{ __('about.value_5_desc') }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="about-image-wrapper">
                        <img src="{{asset('assets/website/images/qeyamin_sec.jpeg')}}" alt="عامل يعمل على هيكل معدني"
                            class="img-fluid rounded-3" />
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
