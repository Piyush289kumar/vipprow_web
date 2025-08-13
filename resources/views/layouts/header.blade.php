<!-- Preloader Start -->
{{-- <div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner">
        </div>
        <div class="txt-loading">
            <span data-text-preloader="C" class="letters-loading">
                V
            </span>
            <span data-text-preloader="L" class="letters-loading">
                I
            </span>
            <span data-text-preloader="O" class="letters-loading">
                P
            </span>
            <span data-text-preloader="D" class="letters-loading">
                P
            </span>
            <span data-text-preloader="L" class="letters-loading">
                R
            </span>
            <span data-text-preloader="Y" class="letters-loading">
                O
            </span>
            <span data-text-preloader="Y" class="letters-loading">
                W
            </span>
        </div>
        <p class="text-center">Loading</p>
    </div>
    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
        </div>
    </div>
</div> --}}
<!-- pp Back To Top Start -->
<button id="pp-back-top" class="pp-back-to-top show">
    <i class="fa-solid fa-arrow-up"></i>
</button>
<!-- pp MouseCursor Start -->
<div class="mouseCursor cursor-outer"></div>
<div class="mouseCursor cursor-inner"></div>
<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('index') }}">
                            <img src="assets/img/logo/vipintiwari.png" alt="logo-img"
                                style="border-radius: 50%; width:75px;">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    {{-- Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                    feugiat leo urna eget eros. Duis Aenean a imperdiet risus. --}}
                </p>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>Contact Info</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">{!! optional(\App\Models\AppConfiguration::first())->address !!}
                                </a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:{!! optional(\App\Models\AppConfiguration::first())->email !!}"><span
                                        class="mailto:{!! optional(\App\Models\AppConfiguration::first())->email !!}">{!! optional(\App\Models\AppConfiguration::first())->email !!}</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Mod-Sat, 10am - 06pm</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:+91{!! optional(\App\Models\AppConfiguration::first())->phone !!}">+91 {!! optional(\App\Models\AppConfiguration::first())->phone !!}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                    </div>
                    <a href="event-details.html" class="pp-theme-btn">
                        <span class="pp-icon-btn"><i class="icon-icon-1"></i></span>
                        <span class="pp-text-btn">
                            <span class="pp-text-2">UPCOMMING EVENT</span>
                        </span>
                    </a>
                    @php
                        $config = \App\Models\AppConfiguration::first();
                        // Map model field names to FontAwesome icon classes
                        $socialIcons = [
                            'whatsapp_link' => 'fab fa-whatsapp',
                            'facebook_link' => 'fab fa-facebook-f',
                            'instagram_link' => 'fab fa-instagram',
                            'twitter_link' => 'fab fa-twitter',
                            'youtube_link' => 'fab fa-youtube',
                            'linkedin_link' => 'fab fa-linkedin-in',
                        ];
                    @endphp
                    <div class="social-icon d-flex align-items-center">
                        @foreach ($socialIcons as $field => $icon)
                            @if (!empty($config->$field))
                                <a href="{{ $config->$field }}" target="_blank">
                                    <i class="{{ $icon }}"></i>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<!-- Header Section Start -->
<header id="header-sticky" class="header-1 header-2">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ route('index') }}" class="header-logo">
                        <img src="assets/img/logo/vipintiwari.png" alt="logo-img"
                            style="border-radius: 50%; width: 55px;">
                    </a>
                    <a href="{{ route('index') }}" class="header-logo-2">
                        <img src="assets/img/logo/vipintiwari.png" alt="logo-img"
                            style="border-radius: 50%; width: 55px;">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="">
                                    <a href="{{ route('index') }}" class="border-none">
                                        Home
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('service') }}" class="border-none">
                                        Services
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('blogs') }}" class="border-none">
                                        Blogs
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ route('about') }}" class="border-none">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <a href="{{ route('contact') }}" class="pp-theme-btn">
                        Get a quote <i class="fa-solid fa-arrow-right-long"></i>
                    </a>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <div class="header-bar">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
