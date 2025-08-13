<!-- Pp Footer Section Start -->
<footer class="pp-footer-section-2 bg-cover" style="background-image: url(assets/img/home-2/footer-bg.jpg);">
    <div class="container">
        <div class="pp-footer-widget-wrapper pp-style-2">
            <div class="pp-footer-newsletter">
                <div class="pp-newsletter-content wow fadeInUp" data-wow-delay=".3s">
                    <h2>
                        Take Your Business Higher — Today!
                    </h2>
                    <p>
                       {!! optional(\App\Models\AppConfiguration::first())->about !!}
                    </p>
                </div>
                <form action="#" class="wow fadeInUp" data-wow-delay=".5s">
                    <div class="form-clt">
                        <input type="text" name="email" id="email" placeholder="Enter your mail">
                        <button type="submit" class="pp-theme-btn">
                            <i class="fa-solid fa-paper-plane"></i> React Us
                        </button>
                    </div>
                </form>
            </div>
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <a href="index.html" class="pp-footer-logo">
                                <img src="assets/img/logo/vipintiwari.png" alt="img" style="width: 55px;">
                            </a>
                        </div>
                        <div class="pp-footer-content">
                            <p>
                                It is a long established fact that from will be distracted by the readable from when
                                looking.
                            </p>
                            <div class="social-icon d-flex align-items-center">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <h3>Quick Links</h3>
                        </div>
                        <ul class="pp-list-area">
                            <li>
                                <a href="index.html">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Services
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Blogs
                                </a>
                            </li>
                            <li>
                                <a href="service.html">
                                    Service
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <h3>Company</h3>
                        </div>
                        <ul class="pp-list-area">
                            <li>
                                <a href="contact.html">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Terms & Conditions
                                </a>
                            </li>
                            <li>
                                <a href="contact.html">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ps-lg-2 wow fadeInUp" data-wow-delay=".8s">
                    <div class="pp-footer-widget-items">
                        <div class="pp-widget-head">
                            <h3>Ready to Get Started?</h3>
                        </div>
                        <div class="pp-contact-info">
                            <div class="pp-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="pp-content">
                                <h6>
                                    <a href="mailto:{!! optional(\App\Models\AppConfiguration::first())->email !!}">
                                        {!! optional(\App\Models\AppConfiguration::first())->email !!}
                                    </a> <br>                                    
                                </h6>
                            </div>
                        </div>
                        <div class="pp-contact-info mb-0">
                            <div class="pp-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="pp-content">
                                <h6>
                                    <a href="tel:+91{!! optional(\App\Models\AppConfiguration::first())->phone !!}">+91 {!! optional(\App\Models\AppConfiguration::first())->phone !!}</a> <br>                                    
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom3">
        <div class="container">
            <div class="pp-footer-bottom-wrapper">
                <p class="wow fadeInUp" data-wow-delay=".3s">Copyright© <b>Vipprow Pvt. Ltd.</b></p>
                <ul class="pp-footer-list wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="contact.html">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="contact.html">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
