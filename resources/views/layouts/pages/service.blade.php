@extends('layouts.app')

@section('title', 'Service')

@section('content')

    <!-- Pp-Breadcrumb wrapper Start -->
    <div class="pp-breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.jpg);">
        <div class="container">
            <div class="pp-page-heading">
                <div class="pp-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Services</h1>
                </div>
                <ul class="pp-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('index') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Services
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pp-Offer Section Start -->
    <section class="pp-offer-section section-padding fix section-bg">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/01.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                Social Media Management
                            </h3>
                            <p>
                                Plan, post, and monitor all your social platforms from one dashboard.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/02.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                Email Marketing Automation
                            </h3>
                            <p>
                                Create, schedule, and track email campaigns with ease.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/03.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                SEO Optimization Tools
                            </h3>
                            <p>
                                Improve your site ranking with keyword suggestions and on-page analysis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/01.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                Social Media Management
                            </h3>
                            <p>
                                Plan, post, and monitor all your social platforms from one dashboard.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/02.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                Email Marketing Automation
                            </h3>
                            <p>
                                Create, schedule, and track email campaigns with ease.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pp-offer-box-item mt-0">
                        <div class="pp-offer-icon">
                            <img src="assets/img/home-1/icon/03.svg" alt="img">
                        </div>
                        <div class="pp-offer-content">
                            <h3>
                                SEO Optimization Tools
                            </h3>
                            <p>
                                Improve your site ranking with keyword suggestions and on-page analysis.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.components.testimonial')

    @include('layouts.components.blogScroller')

@endsection
