@extends('layouts.app')



@section('content')

    <!-- Pp-Breadcrumb wrapper Start -->
    <div class="pp-breadcrumb-wrapper fix bg-cover"
        style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="pp-page-heading">
                <div class="pp-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Details</h1>
                </div>
                <ul class="pp-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        {{ $blog->title }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Pp-news Section2 Start -->
    <section class="pp-news-details-section section-padding">
        <div class="container">
            <div class="pp-news-details-wrapper">
                <div class="row g-4">
                    <div class="col-12 col-lg-8">

                        {{-- Blog Featured Image --}}
                        <div class="pp-details-image">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                        </div>

                        {{-- Blog Content --}}
                        <div class="pp-news-details-content">
                            <h3>{{ $blog->title }}</h3>
                            <p>
                                {!! $blog->body !!}
                            </p>
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
