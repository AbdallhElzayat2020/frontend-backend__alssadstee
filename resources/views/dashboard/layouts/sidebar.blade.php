<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.home') }}" class="app-brand-link">
            <img src="{{ asset('assets/website/images/logo.png') }}" alt="Logo" width="160">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
            <a href="{{ route('dashboard.home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Home">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.contacts.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.contacts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-mail"></i>
                <div data-i18n="Contacts">Contacts</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.quotes.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.quotes.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-file-invoice"></i>
                <div data-i18n="Quotes">Quotes</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.faqs.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.faqs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="FAQs">FAQs</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.job-applications.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.job-applications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Job Applications">Job Applications</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Products">Products</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.page-seo.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.page-seo.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-tags"></i>
                <div data-i18n="Website SEO">Website pages SEO</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.url-redirects.*') ? 'active' : '' }}">
            <a href="{{ route('dashboard.url-redirects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-arrow-forward-up"></i>
                <div data-i18n="URL Redirects">URL redirects</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('dashboard.blogs.*', 'dashboard.blog-categories.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-news"></i>
                <div data-i18n="Blog">Blog</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.blogs.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.blogs.index') }}" class="menu-link">
                        <div data-i18n="Posts">Posts</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.blog-categories.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.blog-categories.index') }}" class="menu-link">
                        <div data-i18n="Categories">Categories</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
