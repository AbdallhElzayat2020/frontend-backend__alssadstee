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

                    @if ($faqs->count())
                        <div class="accordion accordion-flush" id="faqAccordion">
                            @foreach ($faqs as $index => $faq)
                                @php
                                    $question = $faq->question[app()->getLocale()] ?? $faq->question['en'] ?? '';
                                    $answer = $faq->answer[app()->getLocale()] ?? $faq->answer['en'] ?? '';
                                    $collapseId = "faq-collapse-{$index}";
                                    $headingId = "faq-heading-{$index}";
                                @endphp
                                <div class="accordion-item faq-item">
                                    <h2 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $collapseId }}" aria-expanded="false"
                                            aria-controls="{{ $collapseId }}">
                                            <i class="fas fa-question-circle me-3"></i>
                                            {{ $question }}
                                        </button>
                                    </h2>
                                    <div id="{{ $collapseId }}" class="accordion-collapse collapse"
                                        aria-labelledby="{{ $headingId }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {{ $answer }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">{{ __('faq.empty_state') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
