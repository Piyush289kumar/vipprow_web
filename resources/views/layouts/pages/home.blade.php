@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Pp-Hero Section Start -->
    <section class="pp-hero-section pp-hero-2 fix bg-cover"
        style="background-image: url(assets/img/home-2/hero/hero-bg.jpg);">
        <div class="pp-hero-image-1 float-bob-y">
            <img src="assets/img/home-2/hero/hero-1.png" alt="img">
        </div>
        <div class="pp-hero-shape-1 float-bob-y">
            <img src="assets/img/home-2/hero/shape-1.png" alt="img">
        </div>
        <div class="pp-hero-image-2 float-bob-x">
            <img src="assets/img/home-2/hero/hero-2.png" alt="img">
        </div>
        <div class="pp-hero-shape-2 float-bob-y">
            <img src="assets/img/home-2/hero/shape-2.png" alt="img">
        </div>
        <div class="pp-hero-image-3 float-bob-y">
            <img src="assets/img/home-2/hero/hero-3.png" alt="img">
        </div>
        <div class="pp-hero-shape-3 float-bob-y">
            <img src="assets/img/home-2/hero/shape-3.png" alt="img">
        </div>
        <div class="pp-hero-image-4 float-bob-x">
            <img src="assets/img/home-2/hero/hero-4.png" alt="img">
        </div>
        <div class="pp-hero-image-5 float-bob-y">
            <img src="assets/img/home-2/hero/hero-5.png" alt="img">
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="pp-hero-content">
                        <h6>
                            <img src="assets/img/home-2/hero/dgroup.png" alt=""> 50+ Happy customers
                            worldwide
                        </h6>
                        <h1>
                            All-in-One SaaS Ecosystem to Power Your Business Growth
                        </h1>

                        <p>{!! optional(\App\Models\AppConfiguration::first())->about !!}</p>

                        <div class="pp-hero-button">
                            <a href="contact.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Contact Us
                                <i class="fa-solid fa-arrow-right-long"></i></a>
                            {{-- <a href="contact.html" class="pp-theme-btn pp-style-2 wow fadeInUp" data-wow-delay=".3s">Watch
                                Demo <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pp-About Section Start -->
    <section class="pp-about-section section-padding fix">
        <div class="container">
            <div class="pp-about-wrapper-2">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="pp-about-content">
                            <div class="pp-section-title mb-0">
                                <span class="pp-sub-title pp-style-border wow fadeInUp">Who We Are</span>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Crafting Ideas into Digital Impact
                                </h2>
                            </div>
                            <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                In vestibulum dui a odio pharetra, nec accumsan sapien consectetur. Pellentesque magna
                                risus, volutpat a vestibulum ut, tempus et quam. Nulla vitae erat blandit, mattis nisl
                                ut, venenatis enim. Maecenas tempus arcu tincidunt.
                            </p>
                            <div class="pp-about-item">
                                <div class="pp-about-text wow fadeInUp" data-wow-delay=".3s">
                                    <h6>
                                        <img src="assets/img/home-1/icon/cheak.svg" alt="img"> Smart Automation
                                    </h6>
                                    <p>
                                        Streamline repetitive tasks and workflows with intelligent automation tools.
                                    </p>
                                </div>
                                <div class="pp-about-text wow fadeInUp" data-wow-delay=".5s">
                                    <h6>
                                        <img src="assets/img/home-1/icon/cheak.svg" alt="img"> Powerful
                                        Automation
                                    </h6>
                                    <p>
                                        Donec eu hendrerit lorem. In ultrices erat pulvinar venenatis auctor.
                                    </p>
                                </div>
                            </div>
                            <a href="about.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Discover More
                                <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pp-about-image">
                            <img src="assets/img/home-2/about/01.png" alt="img" class="wow img-custom-anim-right"
                                data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <div class="pp-blur-shape">
                                <img src="assets/img/home-2/about/blur-shape.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pp-Why-benefit Section Start -->
    <section class="pp-why-benefit-section section-padding fix section-bg">
        <div class="container">
            <div class="pp-section-title text-center">
                <span class="pp-sub-title pp-style-border wow fadeInUp">Benefits</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Why Choose Our Smart Solution
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/01.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Intelligent Automation
                            </h3>
                            <p>
                                Automate repetitive tasks,workflows and processes to save time
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/02.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Next-Gen Analytics
                            </h3>
                            <p>
                                Forecast trends and behaviors using machine learning
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/03.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Irregularity Alert
                            </h3>
                            <p>
                                Instantly detect unusual patterns or risks in large datasets.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/04.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Sentiment Analysis
                            </h3>
                            <p>
                                Understand customer emotions and opinions across reviews
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/05.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Connected Solutions
                            </h3>
                            <p>
                                Connect AI tools seamlessly with your existing software, CRMs
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="pp-why-benefit-item">
                        <div class="pp-icon">
                            <img src="assets/img/home-2/icon/06.svg" alt="img">
                        </div>
                        <div class="pp-content">
                            <h3>
                                Business Growth
                            </h3>
                            <p>
                                Enhance decision-making with AI-driven dashboards
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pp-feature Section Start -->
    <section class="pp-feature-section-2 section-padding fix bg-cover"
        style="background-image: url(assets/img/home-2/feature/bg.jpg);">
        <div class="container">
            <div class="pp-feature-wrapper-2">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="pp-feature-content">
                            <div class="pp-section-title mb-0">
                                <span class="pp-sub-title text-white pp-style-border wow fadeInUp">The Upshift
                                    Hub</span>
                                <h2 class=" text-white wow fadeInUp" data-wow-delay=".3s">
                                    Experience the Next Smart Work with The Upshift
                                </h2>
                            </div>
                            <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                Duis congue eget neque sit amet mollis. Aliquam auctor diam sit amet efficitur
                                condimentum. Aliquam vitae scelerisque leo, eu vulputate felis. Donec et tristique nisl.
                                Ut bibendum vehicula elit a consequat.
                            </p>
                            <a href="contact.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Discover
                                More <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pp-feature-image">
                            <img src="assets/img/home-2/feature/01.jpg" alt="img" class="wow img-custom-anim-right"
                                data-wow-duration="1.3s" data-wow-delay="0.3s">
                            <div class="pp-feature-image-2 float-bob-y">
                                <img src="assets/img/home-2/feature/02.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pp-Feature-Privacy Section Start -->
    <section class="pp-feature-privacy-section section-padding fix">
        <div class="container">
            <div class="pp-feature-privacy-wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="pp-feature-privacy-image wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-2/feature/03.png" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pp-feature-privacy-content">
                            <div class="pp-section-title mb-0">
                                <span class="pp-sub-title pp-style-border wow fadeInUp">Safe and sound</span>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Next-Level Privacy Protection
                                </h2>
                            </div>
                            <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                Our AI is built with privacy at its core. Your data stays secure, encrypted, and under
                                your control — ensuring powerful performance without compromising confidentiality or
                                trust. Intelligence, with integrity.
                            </p>
                            <a href="contact.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Stay
                                Compliant with Confidence</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pp-Feature-Connection Section Start -->
    <section class="pp-feature-connection-section section-padding section-bg fix">
        <div class="container">
            <div class="pp-feature-connection-wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="pp-feature-connection-content">
                            <div class="pp-section-title mb-0">
                                <span class="pp-sub-title pp-style-border wow fadeInUp">Combinations</span>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                    Connected. Empowered. Impactful.
                                </h2>
                            </div>
                            <p class="pp-text wow fadeInUp" data-wow-delay=".5s">
                                Instantly connect with your favorite tools and platforms to streamline workflows,
                                automate tasks, and scale faster — no technical hassle required.
                            </p>
                            <a href="contact.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">View All
                                Integrations</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pp-feature-connection-image wow fadeInUp" data-wow-delay=".3s">
                            <img src="assets/img/home-2/feature/04.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.components.testimonial')

    @include('layouts.components.blogScroller')

@endsection
