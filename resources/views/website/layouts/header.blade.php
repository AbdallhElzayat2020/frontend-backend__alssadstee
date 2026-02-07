<nav class="navbar navbar-expand-lg bg-body-tertiary  shadow-sm fixed-top">
    <div class="container px-lg-1">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <img src="{{asset('assets/website/images/logo.png')}}" alt="{{ __('header.company_logo') }}" height="70"
                class="ms-2" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('header.toggle_menu') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        aria-current="{{ request()->routeIs('home') ? 'page' : false }}"
                        href="{{ route('home') }}">{{ __('header.home') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">{{ __('header.about') }}</a>
                </li>

                <!-- Dropdown for pages -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs(['facilities', 'faqs', 'integrated-system', 'media', 'quality', 'jobs']) ? 'active' : '' }}"
                        href="#" id="productsDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ __('header.important_pages') }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="productsDropdown">
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('facilities') ? 'active' : '' }}"
                                href="{{ route('facilities') }}">{{ __('header.facilities') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('faqs') ? 'active' : '' }}"
                                href="{{ route('faqs') }}">{{ __('header.faqs') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('integrated-system') ? 'active' : '' }}"
                                href="{{ route('integrated-system') }}">{{ __('header.integrated_system') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('media') ? 'active' : '' }}"
                                href="{{ route('media') }}">{{ __('header.media') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('quality') ? 'active' : '' }}"
                                href="{{ route('quality') }}">{{ __('header.quality') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ request()->routeIs('jobs') ? 'active' : '' }}"
                                href="{{ route('jobs') }}">{{ __('header.jobs') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}"
                        href="{{ route('products') }}">{{ __('header.products') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }}"
                        href="{{ route('contact-us') }}">{{ __('header.contact_us') }}</a>
                </li>


                <li class="nav-item dropdown">
                    <div class="dropdown">
                        @php
                            $flagSrc = app()->getLocale() === 'ar' ? 'https://flagcdn.com/sa.svg' : 'https://flagcdn.com/gb.svg';
                        @endphp
                        <button id="langBtn"
                            class="btn btn-ghost dropdown-toggle d-flex align-items-center gap-2 nav-link"
                            data-bs-toggle="dropdown" type="button">
                            <img src="{{ $flagSrc }}" width="20" height="14" alt="flag" class="rounded border"
                                referrerpolicy="no-referrer" />
                            <span>{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @php
                                    $itemFlagSrc = $localeCode === 'ar' ? 'https://flagcdn.com/sa.svg' : 'https://flagcdn.com/gb.svg';
                                @endphp
                                <li>
                                    <a class="dropdown-item lang-switch d-flex align-items-center gap-2" rel="alternate"
                                        hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <img src="{{ $itemFlagSrc }}" width="20" height="14" alt="flag"
                                            class="rounded border" referrerpolicy="no-referrer" />
                                        <span>{{ $properties['native'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-3 mt-lg-0">
                    <div class="social-links d-flex align-items-center gap-2">
                        <a class="icon-link" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="icon-link" href="#" aria-label="X"><i class="fab fa-twitter"></i></a>
                        <a class="icon-link" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </li>
                <li class="nav-item mt-3 mt-lg-0">
                    <a class="btn btn-primary px-4" href="{{ route('quote') }}">{{ __('header.request_quote') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
