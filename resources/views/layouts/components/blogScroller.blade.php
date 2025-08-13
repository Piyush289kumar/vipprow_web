 <!-- Pp-news Section2 Start -->
 <section class="pp-news-section-2 section-padding fix">
     <div class="container">
         <div class="pp-section-title text-center">
             <span class="pp-sub-title pp-style-border wow fadeInUp">Our Blog</span>
             <h2 class="wow fadeInUp" data-wow-delay=".3s">
                 Latest Posts and Articles
             </h2>
         </div>
         <div class="row">


             @foreach ($recentBlogs as $recent)
                 <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                     <div class="pp-news-card-item-2">
                         <div class="pp-news-image">
                             <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}">
                             <span>{{ $recent->category->name }}</span>
                         </div>
                         <div class="pp-news-content">
                             <h3>
                                 <a href="{{ route('single-blog', $recent->slug) }}">
                                     {{ $recent->title }}
                                 </a>
                             </h3>
                             <ul class="news-post">
                                 <li class="pp-style-2">
                                     <i class="fa-regular fa-calendar-days"></i>
                                     {{ $recent->created_at->format('F d, Y') }}
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             @endforeach



         </div>
     </div>
 </section>
