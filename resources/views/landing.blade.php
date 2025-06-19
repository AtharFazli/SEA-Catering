<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SEA Catering</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('/QuickStart/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('/QuickStart/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('/QuickStart/assets/img/logo.png') }}" alt="">
        <h1 class="sitename">SEA Catering</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('mealplans') }}" class="{{  Route::is('mealplans') ? 'active' : '' }}">Meal Plans</a></li>
          <li><a href="{{ route('subscriptions') }}" class="{{ Route::is('subscriptions') ? 'active' : '' }}">Subscription</a></li>
          <li><a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'active' : '' }}">Contact Us</a></li>
          <li class="dropdown"><a href="#"><span>User (Guest)</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="{{ asset('/QuickStart/assets/img/hero-bg-light.webp') }}" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Welcome to <span>SEA Catering</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Healthy Meals, Anytime, Anywhere<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
          </div>
          <img src="{{ asset('/QuickStart/assets/img/hero-services-img.webp') }}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-sliders"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Meal Customization</a></h4>
                <p class="description">Choose your ingredients, portion sizes, and dietary preferences. We make each meal just right for you.</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-truck"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Delivery to Major Cities</a></h4>
                <p class="description">Fast, reliable delivery service to Jakarta, Bandung, Surabaya, and other major cities across Indonesia.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-clipboard-data"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Detailed Nutritional Information</a></h4>
                <p class="description">Know exactly what you’re eating with transparent, easy-to-read nutritional breakdowns for every meal.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Who We Are</p>
            <h3>Fueling Wellness with Fresh, Personalized Meals</h3>
            <p class="fst-italic">
              Welcome to SEA Catering — your trusted partner for fresh, healthy, and fully customizable meals delivered straight to your door anywhere in Indonesia. Whether you're looking to eat clean, fuel your fitness, or simply enjoy nutritious dishes crafted with care, we make it easy to stay on track with flavors you'll love and convenience you can count on.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Custom Nutrition Plans – Tailored meals to suit your health goals, dietary needs, and personal preferences.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Fresh & Local Ingredients – Sourced daily to ensure quality, taste, and sustainability in every bite.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Nationwide Delivery – Whether you're in the city or remote areas, we bring wellness wherever you are.</span></li>
            </ul>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="{{ asset('/img/meal1.jpg') }}" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="{{ asset('/img/meal2.jpg') }}" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="{{ asset('/img/meal3.jpg') }}" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section id="" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-1.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{ asset('/QuickStart/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
          </div><!-- End Client Item -->

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section id="" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Why Choose SEA Catering?</h2>
        <p>Healthy food made simple — personalized, nutritious, and delivered wherever you are.</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row justify-content-between">

          <div class="col-lg-5 d-flex align-items-center">

            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-sliders"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Meal Customization</h4>
                    <p>
                      Build your perfect meal from the ground up. Select your protein, carbs, veggies, and even cooking methods. Whether you're on a keto, plant-based, or balanced diet, we've got options tailored to your goals and taste.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-truck"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Delivery to Major Cities</h4>
                    <p>
                      Fresh meals, delivered fast. We ship daily to major cities like Jakarta, Bandung, and Surabaya using temperature-controlled packaging to ensure your meals arrive just the way they should — fresh and ready.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-clipboard-data"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Detailed Nutritional Info</h4>
                    <p>
                      Every meal includes a full nutrition profile, so you can track your intake with confidence. From calories to macronutrients, we provide the details you need to make informed decisions.
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->

          </div>

          <div class="col-lg-6">

            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="{{ asset('/img/ingredients1.jpg') }}" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->


          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    

    <!-- Services Section -->
<section id="" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>Bringing health, flavor, and convenience together — discover how SEA Catering helps you eat better every day.</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row g-5">

      <!-- Meal Customization -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item item-cyan position-relative">
          <i class="bi bi-sliders icon"></i>
          <div>
            <h3>Meal Customization</h3>
            <p>Build your meals your way. Choose ingredients, portions, and preferences that match your lifestyle and dietary goals.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Nationwide Delivery -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item item-orange position-relative">
          <i class="bi bi-truck icon"></i>
          <div>
            <h3>Nationwide Delivery</h3>
            <p>We deliver to Jakarta, Bandung, Surabaya, and more — with reliable, temperature-controlled packaging for guaranteed freshness.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Nutritional Info -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item item-teal position-relative">
          <i class="bi bi-clipboard-data icon"></i>
          <div>
            <h3>Nutritional Transparency</h3>
            <p>Track what you eat with detailed macros, calories, and ingredient breakdowns on every meal we offer.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Weekly & Monthly Plans -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item item-red position-relative">
          <i class="bi bi-calendar-check icon"></i>
          <div>
            <h3>Weekly & Monthly Plans</h3>
            <p>Stay consistent with flexible subscription plans. Perfect for individuals, families, or office teams looking to eat healthy long-term.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Locally Sourced Ingredients -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item item-indigo position-relative">
          <i class="bi bi-basket icon"></i>
          <div>
            <h3>Local, Fresh Ingredients</h3>
            <p>We partner with trusted local farmers and markets to bring you the freshest ingredients in every meal.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Personalized Support -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item item-pink position-relative">
          <i class="bi bi-chat-dots icon"></i>
          <div>
            <h3>Personalized Support</h3>
            <p>Got questions about your meal plan or nutrition? Our support team is ready to help you make the most of every bite.</p>
            <a href="#" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /Services Section -->


  
  </main>

  <footer id="footer" class="footer position-relative light-background">

  <div class="container footer-top">
    <div class="row gy-4">
      
      <!-- Footer About -->
      <div class="col-lg-6 col-md-6 footer-about">
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="sitename">SEA Catering</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Jl. Daan Mogot No.KM. 11 1, RT.12/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng</p>
          <p>Kota Jakarta Barat, DKI Jakarta 11710</p>
          <p class="mt-3"><strong>Phone:</strong> <span>+62 878 1609 8777</span></p>
          <p><strong>Email:</strong> <span>atharfs9@gmail.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href="#"><i class="bi bi-twitter-x"></i></a>
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
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

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">SEA Catering</strong><span>All Rights Reserved</span></p>
    <div class="credits">
      Designed with ❤️ by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>

</footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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