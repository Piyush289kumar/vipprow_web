@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Pp-Breadcrumb wrapper Start -->
    <div class="pp-breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.jpg);">
        <div class="container">
            <div class="pp-page-heading">
                <div class="pp-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog List</h1>
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
                        Blogs
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pp-news Section2 Start -->
    <section class="news-standard-section section-padding">
        <div class="container">
            <div class="pp-news-standard-wrapper">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="pp-news-standard-items">
                            <div class="pp-news-card-items-4">
                                <div class="pp-news-image">
                                    <img src="assets/img/home-2/news/news-7.jpg" alt="img">
                                </div>
                                <div class="pp-news-content">
                                    <ul class="pp-date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i> 11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i> 19 Comments
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">
                                            Choose The Best IT Service Company in the City.
                                        </a>
                                    </h3>
                                    <p>
                                        Pellentesque egestas rutrum nibh facilisis ultrices. Phasellus in magna ut orci
                                        malesuada the sollicitudin. Aenean faucibus scelerisque convallis. Quisque interdum
                                        mauris id nunc molestie tincidunt erat gravida. Nullam dui libero, mollis ac quam
                                        et, venenatis.
                                    </p>
                                    <a href="news-details.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Read
                                        More <i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                            <div class="pp-news-card-items-4">
                                <div class="pp-news-image">
                                    <img src="assets/img/home-2/news/news-8.jpg" alt="img">
                                </div>
                                <div class="pp-news-content">
                                    <ul class="pp-date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i> 11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i> 19 Comments
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">
                                            Keep Your Business Safe Ensure High Availability
                                        </a>
                                    </h3>
                                    <p>
                                        Pellentesque egestas rutrum nibh facilisis ultrices. Phasellus in magna ut orci
                                        malesuada the sollicitudin. Aenean faucibus scelerisque convallis. Quisque interdum
                                        mauris id nunc molestie tincidunt erat gravida. Nullam dui libero, mollis ac quam
                                        et, venenatis.
                                    </p>
                                    <a href="news-details.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Read
                                        More <i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                            <div class="pp-news-card-items-4 mb-0">
                                <div class="pp-news-image">
                                    <img src="assets/img/home-2/news/news-9.jpg" alt="img">
                                </div>
                                <div class="pp-news-content">
                                    <ul class="pp-date-list">
                                        <li>
                                            <i class="fa-solid fa-calendar-days"></i> 11 March 2025
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-comments"></i> 19 Comments
                                        </li>
                                    </ul>
                                    <h3>
                                        <a href="news-details.html">
                                            Tackling the Changes of Retell Industry
                                        </a>
                                    </h3>
                                    <p>
                                        Pellentesque egestas rutrum nibh facilisis ultrices. Phasellus in magna ut orci
                                        malesuada the sollicitudin. Aenean faucibus scelerisque convallis. Quisque interdum
                                        mauris id nunc molestie tincidunt erat gravida. Nullam dui libero, mollis ac quam
                                        et, venenatis.
                                    </p>
                                    <a href="news-details.html" class="pp-theme-btn wow fadeInUp" data-wow-delay=".3s">Read
                                        More <i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                            <div class="page-nav-wrap">
                                <ul>
                                    <li class="active"><a class="page-numbers" href="#">1</a></li>
                                    <li><a class="page-numbers" href="#">2</a></li>
                                    <li><a class="page-numbers" href="#">3</a></li>
                                    <li><a class="page-numbers" href="#"><i class="fa-solid fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="pp-main-sideber sticky-style">
                            <div class="pp-single-sideber-widget">
                                <div class="pp-widget-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="pp-category-list">
                                    <li><a href="news-details.html">Technology</a><span>(7)</span></li>
                                    <li><a href="news-details.html">Business</a><span>(4)</span></li>
                                    <li><a href="news-details.html">Apps Development</a><span>(5)</span></li>
                                    <li><a href="news-details.html">Social Marketing</a><span>(3)</span></li>
                                    <li><a href="news-details.html">System</a><span>(6)</span></li>
                                </ul>
                            </div>
                            <div class="pp-single-sideber-widget">
                                <div class="pp-widget-title">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="pp-recent-post-area">
                                    <div class="pp-recent-items">
                                        <div class="pp-recent-thumb">
                                            <img src="assets/img/home-2/news/post-1.jpg" alt="img">
                                        </div>
                                        <div class="pp-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    Which Yoga Hybrid is Right for Your?
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pp-recent-items">
                                        <div class="pp-recent-thumb">
                                            <img src="assets/img/home-2/news/post-2.jpg" alt="img">
                                        </div>
                                        <div class="pp-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    Keep Your Business Safe Ensure High Availability
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pp-recent-items">
                                        <div class="pp-recent-thumb">
                                            <img src="assets/img/home-2/news/post-3.jpg" alt="img">
                                        </div>
                                        <div class="pp-recent-content">
                                            <h5>
                                                <a href="news-details.html">
                                                    Tackling the Changes of Retell Industry
                                                </a>
                                            </h5>
                                            <ul>
                                                <li>
                                                    March 26, 2025
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pp-single-sideber-widget mb-0">
                                <div class="pp-widget-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="tagcloud">
                                    <a href="news-details.html">Security</a>
                                    <a href="news-details.html">Business</a>
                                    <a href="news-details.html">Digital</a>
                                    <a href="news-details.html">Technology</a>
                                    <a href="news-details.html">Change</a>
                                    <a href="news-details.html">Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
