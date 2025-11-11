<!DOCTYPE html>
@php
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $isRTL = $currentLocale === 'ar';
    $htmlLang = $currentLocale;
    $htmlDir = $isRTL ? 'rtl' : 'ltr';
@endphp
<html lang="{{ $htmlLang }}" dir="{{ $htmlDir }}">

@include('website.layouts.head')

<body>
    <!-- Navbar -->
    @include('website.layouts.header')

    @yield('content')

    <!-- Footer -->
    @include('website.layouts.footer')

    <!-- Floating contact buttons -->
    @include('website.components.social_links')


    @include('website.layouts.scripts')
</body>

</html>
