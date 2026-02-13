<footer>
    <div class="container footer-top">
        <img src="{{asset('assets/website/images/logo.png')}}" alt="{{ __('footer.logo_alt') }}">

        <div class="footer-links mb-3">
            <a href="{{ route('home') }}">{{ __('footer.home') }}</a>
            <a href="{{ route('about') }}">{{ __('footer.about') }}</a>
            <a href="{{ route('products') }}">{{ __('footer.products') }}</a>
            <a href="{{ route('faqs') }}">{{ __('footer.faqs') }}</a>
            <a href="{{ route('quality') }}">{{ __('footer.certificates') }}</a>
            <a href="{{ route('contact-us') }}">{{ __('footer.contact_us') }}</a>
        </div>

        <div class="contact-info">
            <p>{{ __('footer.address_label') }}: {{ __('footer.address') }}</p>
            <p>{{ __('footer.phone_label') }}: {{ __('footer.phone') }} · {{ __('footer.email_label') }}:
                {{ __('footer.email') }}</p>
        </div>

        <div class="social-icons my-3">
            <a href="https://www.linkedin.com/company/alssad-steel/" target="_blank"><i
                    class="fa-brands fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/alssadsteel?igsh=OGw1ZnFhN2s4ejcw&utm_source=qr" target="_blank"><i
                    class="fa-brands fa-instagram"></i></a>
            <a href="https://x.com/alssadsteel?s=21" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.facebook.com/share/1DY3tkYtmT/?mibextid=wwXIfr" target="_blank"><i
                    class="fa-brands fa-facebook-f"></i></a>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="mb-0">{{ str_replace(':year', date('Y'), __('footer.copyright')) }}</p>
    </div>
</footer>
