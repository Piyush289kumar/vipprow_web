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

                            @foreach ($blogs as $blog)
                                <div class="pp-news-card-items-4">
                                    <div class="pp-news-image">
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                                    </div>
                                    <div class="pp-news-content">
                                        <ul class="pp-date-list">
                                            <li>
                                                <i class="fa-solid fa-calendar-days"></i>
                                                {{ $blog->created_at->format('d F Y') }}
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-comments"></i> {{ $blog->comments_count ?? 0 }}
                                                Comments
                                            </li>
                                        </ul>
                                        <h3>
                                            <a href="{{ route('single-blog', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ Str::limit(strip_tags($blog->content), 150, '...') }}
                                        </p>
                                        <a href="{{ route('single-blog', $blog->slug) }}" class="pp-theme-btn wow fadeInUp"
                                            data-wow-delay=".3s">
                                            Read More <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach



                            <div class="page-nav-wrap">

                                {{-- Pagination Links --}}
                                <div class="mt-4">
                                    {{ $blogs->links('pagination::bootstrap-4') }}
                                </div>

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
                                    @foreach ($category as $cat)
                                        <li>
                                            <a href="{{ route('blogs', ['category' => $cat->slug]) }}">
                                                {{ $cat->name }}
                                            </a>
                                            <span>({{ $cat->blogs_count ?? 0 }})</span>
                                        </li>
                                    @endforeach
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
