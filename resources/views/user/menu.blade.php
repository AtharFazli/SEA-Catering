<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Starter Page - QuickStart Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('/QuickStart/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/QuickStart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/QuickStart/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/QuickStart/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/QuickStart/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/QuickStart/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/QuickStart/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/QuickStart/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

    <header class="header d-flex align-items-center sticky-top" id="header">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a class="logo d-flex align-items-center me-auto" href="index.html">
                <img src="assets/img/logo.png" alt="">
                <h1 class="sitename">QuickStart</h1>
            </a>

            <nav class="navmenu" id="navmenu">
                <ul>
                    <li><a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="{{ Route::is('mealplans') ? 'active' : '' }}" href="{{ route('mealplans') }}">Meal
                            Plans</a></li>
                    <li><a class="{{ Route::is('subscriptions') ? 'active' : '' }}"
                            href="{{ route('subscriptions') }}">Subscription</a></li>
                    <li><a class="{{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact
                            Us</a></li>
                    <li class="dropdown"><a href="#"><span>User (Guest)</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Pricing Section -->
<section class="pricing section" id="mealplans">

  <!-- Section Title -->
  <div class="section-title container" data-aos="fade-up">
    <h2>Our Meal Plans</h2>
    <p>Healthy, ready-to-enjoy meals designed to fit your lifestyle and goals.</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <!-- Diet Plan -->
<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
  <div class="pricing-item h-100">
    <h3>Diet Plan</h3>
    <p class="description">Ideal for calorie-conscious individuals. Enjoy balanced meals designed to support weight management and a healthy lifestyle.</p>
    <h4><sup>Rp</sup>30K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">Choose Plan</a>
    <p class="small text-center">No minimum order required</p>
  </div>
</div><!-- End Pricing Item -->

<!-- Protein Plan -->
<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
  <div class="pricing-item featured h-100">
    <p class="popular">Popular</p>
    <h3>Protein Plan</h3>
    <p class="description">Perfect for active lifestyles and fitness enthusiasts. Packed with lean proteins and nutrients to fuel your day.</p>
    <h4><sup>Rp</sup>40K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">Choose Plan</a>
    <p class="small text-center">Free delivery on weekly orders</p>
  </div>
</div><!-- End Pricing Item -->

<!-- Royal Plan -->
<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
  <div class="pricing-item h-100">
    <h3>Royal Plan</h3>
    <p class="description">Get the full experience with access to premium dishes, exclusive add-ons, and priority support for a luxurious meal journey.</p>
    <h4><sup>Rp</sup>60K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">Choose Plan</a>
    <p class="small text-center">Best value for total customization</p>
  </div>
</div><!-- End Pricing Item -->


    </div>
  </div>

</section><!-- /Pricing Section -->



    </main>

    <footer class="footer position-relative light-background" id="footer">

        <div class="footer-top container">
            <div class="row gy-4">

                <!-- Footer About -->
                <div class="col-lg-6 col-md-6 footer-about">
                    <a class="logo d-flex align-items-center" href="/">
                        <span class="sitename">SEA Catering</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Jl. Daan Mogot No.KM. 11 1, RT.12/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng</p>
                        <p>Kota Jakarta Barat, DKI Jakarta 11710</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+62 878 1609 8777</span></p>
                        <p><strong>Email:</strong> <span>atharfs9@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://github.com/atharfazli/"><i class="bi bi-github"></i></a>
                        <a href="https://x.com/atharfazli/"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.instagram.com/athar_fazli/"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/atharfazli/"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Footer Links -->
                <div class="col-lg-6 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#about">Meal Plans</a></li>
                        <li><a href="#services">Subscription</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="copyright container mt-4 text-center">
            <p>© <span>Copyright</span> <strong class="sitename px-1">SEA Catering</strong><span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed with ❤️ by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a class="scroll-top d-flex align-items-center justify-content-center" id="scroll-top" href="#"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/QuickStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/QuickStart/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/QuickStart/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/QuickStart/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/QuickStart/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/QuickStart/assets/js/main.js') }}"></script>

</body>

</html>
