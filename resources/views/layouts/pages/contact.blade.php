@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Pp-Breadcrumb wrapper Start -->
    <div class="pp-breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.jpg);">
        <div class="container">
            <div class="pp-page-heading">
                <div class="pp-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact Us</h1>
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
                        Contact Us
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pp-contact Section Start -->
    <section class="pp-contact-section section-padding fix">
        <div class="container">
            <div class="pp-contact-wrapper">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="pp-contact-box-item">
                            <h3>
                                Contact Informatlon
                            </h3>
                            <div class="pp-contact-item">
                                <div class="pp-icon">
                                    <i class="fa-regular fa-location-dot"></i>
                                </div>
                                <div class="pp-content">
                                    <h4>Our Address</h4>
                                    <p>
                                        {!! optional(\App\Models\AppConfiguration::first())->address !!}
                                    </p>
                                </div>
                            </div>
                            <div class="pp-contact-item">
                                <div class="pp-icon">
                                    <i class="fa-regular fa-phone-volume"></i>
                                </div>
                                <div class="pp-content">
                                    <h4>Contact Namber</h4>
                                    <p>
                                        <a href="tel:+91{!! optional(\App\Models\AppConfiguration::first())->phone !!}">+91 {!! optional(\App\Models\AppConfiguration::first())->phone !!}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="pp-contact-item mb-0">
                                <div class="pp-icon">
                                    <i class="fa-regular fa-envelope"></i>
                                </div>
                                <div class="pp-content">
                                    <h4>Email Us</h4>
                                    <p>
                                        <a href="mailto:{!! optional(\App\Models\AppConfiguration::first())->email !!}">
                                            {!! optional(\App\Models\AppConfiguration::first())->email !!}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="pp-contact-content">
                            <h3>
                                Ready to Get Started?
                            </h3>
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif


                            <form action="{{ route('contact.submit') }}" method="POST" id="contact-form1"
                                class="pp-contact-form-items">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <span>First Name*</span>
                                            <input type="text" name="first_name" id="first_name" placeholder="First name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <span>Last Name*</span>
                                            <input type="text" name="last_name" id="last_name" placeholder="Last name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <span>Phone *</span>
                                            <input type="text" name="phone" id="phone" placeholder="12345 67890"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <span>Your Email*</span>
                                            <input type="email" name="email" id="email11" placeholder="Your email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".9s">
                                        <div class="form-clt">
                                            <span>Write Message*</span>
                                            <textarea name="message" id="message1" placeholder="Message Here" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">
                                        <button type="submit" class="pp-theme-btn">
                                            Send Message <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>



                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- Map-section Start -->
    {{-- <div class="pp-map-section">
        <div class="pp-map-items">
            <div class="googpemap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div> --}}

    @include('layouts.components.testimonial')

    @include('layouts.components.blogScroller')

@endsection
