@extends('website.layouts.master')
@section('title', 'FAQ')

@section('content')
    <!-- FAQ Page Header -->
    <section class="about-page-header">
        <div class="about-header-overlay"></div>
        <div class="container">
            <div class="about-header-content">
                <h1 class="about-page-title">{{ __('faq.title') }}</h1>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="faq-intro text-center mb-5">
                        <h2 class="faq-main-title mb-3">{{ __('faq.intro_title') }}</h2>
                        <p class="faq-subtitle">{{ __('faq.intro_subtitle') }}</p>
                    </div>

                    <div class="accordion accordion-flush" id="faqAccordion">
                        <!-- Question 1 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-1" aria-expanded="false" aria-controls="faq-collapse-1">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q1') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-1" class="accordion-collapse collapse" aria-labelledby="faq-heading-1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a1') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 2 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-2" aria-expanded="false" aria-controls="faq-collapse-2">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q2') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a2') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 3 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-3" aria-expanded="false" aria-controls="faq-collapse-3">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q3') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a3') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 4 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-4" aria-expanded="false" aria-controls="faq-collapse-4">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q4') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a4') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 5 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-5" aria-expanded="false" aria-controls="faq-collapse-5">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q5') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-5" class="accordion-collapse collapse" aria-labelledby="faq-heading-5"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a5') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 6 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-6" aria-expanded="false" aria-controls="faq-collapse-6">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q6') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-6" class="accordion-collapse collapse" aria-labelledby="faq-heading-6"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a6') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 7 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-7" aria-expanded="false" aria-controls="faq-collapse-7">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q7') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-7" class="accordion-collapse collapse" aria-labelledby="faq-heading-7"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a7') }}
                                </div>
                            </div>
                        </div>

                        <!-- Question 8 -->
                        <div class="accordion-item faq-item">
                            <h2 class="accordion-header" id="faq-heading-8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse-8" aria-expanded="false" aria-controls="faq-collapse-8">
                                    <i class="fas fa-question-circle me-3"></i>
                                    {{ __('faq.questions_q8') }}
                                </button>
                            </h2>
                            <div id="faq-collapse-8" class="accordion-collapse collapse" aria-labelledby="faq-heading-8"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    {{ __('faq.questions_a8') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
