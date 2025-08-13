@extends('layouts.app')

@section('title', 'Blogs')

@section('content')

    <!-- Pp-Breadcrumb wrapper Start -->
    <div class="pp-breadcrumb-wrapper fix bg-cover" style="background-image: url(assets/img/inner-page/breadcrumb.jpg);">
        <div class="container">
            <div class="pp-page-heading">
                <div class="pp-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blogs</h1>
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

    <!-- Blog Side Bar Start -->
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
                                        </ul>
                                        <h3>
                                            <a href="{{ route('single-blog', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ Str::limit(strip_tags($blog->body), 150, '...') }}
                                        </p>
                                        <a href="{{ route('single-blog', $blog->slug) }}" class="pp-theme-btn wow fadeInUp"
                                            data-wow-delay=".3s">
                                            Read More <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                            <div class="page-nav-wrap mt-4">
                                {{ $blogs->links('pagination::bootstrap-4') }}
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

                                    @foreach ($recentBlogs as $recent)
                                        <div class="pp-recent-items">
                                            <div class="pp-recent-thumb">
                                                <img src="{{ asset('storage/' . $recent->image) }}"
                                                    alt="{{ $recent->title }}" style="width: 8rem;">
                                            </div>
                                            <div class="pp-recent-content">
                                                <h5>
                                                    <a href="{{ route('single-blog', $recent->slug) }}">
                                                        {{ $recent->title }}
                                                    </a>
                                                </h5>
                                                <ul>
                                                    <li>
                                                        {{ $recent->created_at->format('F d, Y') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
