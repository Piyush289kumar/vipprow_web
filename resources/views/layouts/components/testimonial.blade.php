 <!-- Pp-feature Section Start -->
 <section class="pp-testimonial-section section-padding fix bg-cover"
     style="background-image: url(assets/img/home-2/testimonial-bg.jpg);">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-10">
                 <div class="swiper pp-testimonial-slider-2">
                     <div class="swiper-wrapper">
                         @foreach ($testimonials as $recent)
                             <div class="swiper-slide">
                                 <div class="pp-testimonial-item-2">
                                     <p>
                                         {{ $recent->review }}
                                     </p>
                                     <h3>
                                         {{ $recent->name }}
                                     </h3>
                                     <span>{{ $recent->designation }}</span>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
