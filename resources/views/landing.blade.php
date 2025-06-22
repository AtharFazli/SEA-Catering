@extends('landing.layouts.master')

@section('title')
    SEA Catering
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero section" id="hero">
        <div class="hero-bg">
            <img src="{{ asset('/QuickStart/assets/img/hero-bg-light.webp') }}" alt="">
        </div>
        <div class="container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 data-aos="fade-up">Welcome to <span>SEA Catering</span></h1>
                <p data-aos="fade-up" data-aos-delay="100">Healthy Meals, Anytime, Anywhere<br></p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a class="btn-get-started" href="#about">Get Yours Now</a>
                </div>
                <img class="img-fluid hero-img" data-aos="zoom-out" data-aos-delay="300"
                    src="{{ asset('/QuickStart/assets/img/hero-services-img.webp') }}" alt="">
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section class="featured-services section light-background" id="">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-sliders"></i></div>
                        <div>
                            <h4 class="title"><a class="stretched-link" href="#">Meal Customization</a></h4>
                            <p class="description">Choose your ingredients, portion sizes, and dietary preferences. We make
                                each meal just right for you.</p>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-truck"></i></div>
                        <div>
                            <h4 class="title"><a class="stretched-link" href="#">Delivery to Major Cities</a></h4>
                            <p class="description">Fast, reliable delivery service to Jakarta, Bandung, Surabaya, and other
                                major cities across Indonesia.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-clipboard-data"></i></div>
                        <div>
                            <h4 class="title"><a class="stretched-link" href="#">Detailed Nutritional Information</a>
                            </h4>
                            <p class="description">Know exactly what you’re eating with transparent, easy-to-read
                                nutritional breakdowns for every meal.</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section class="about section" id="">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Who We Are</p>
                    <h3>Fueling Wellness with Fresh, Personalized Meals</h3>
                    <p class="fst-italic">
                        Welcome to SEA Catering — your trusted partner for fresh, healthy, and fully customizable meals
                        delivered straight to your door anywhere in Indonesia. Whether you're looking to eat clean, fuel
                        your fitness, or simply enjoy nutritious dishes crafted with care, we make it easy to stay on track
                        with flavors you'll love and convenience you can count on.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Custom Nutrition Plans – Tailored meals to suit your
                                health goals, dietary needs, and personal preferences.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Fresh & Local Ingredients – Sourced daily to ensure
                                quality, taste, and sustainability in every bite.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Nationwide Delivery – Whether you're in the city or
                                remote areas, we bring wellness wherever you are.</span></li>
                    </ul>
                </div>

                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <img class="img-fluid" src="{{ asset('/img/meal1.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12">
                                    <img class="img-fluid" src="{{ asset('/img/meal2.jpg') }}" alt="">
                                </div>
                                <div class="col-lg-12">
                                    <img class="img-fluid" src="{{ asset('/img/meal3.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- /About Section -->

    <!-- Clients Section -->
    <section class="clients section" id="">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-1.png') }}" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-2.png') }}" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-3.png') }}" alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-4.png') }}"
                        alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-5.png') }}"
                        alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-6.png') }}"
                        alt="">
                </div><!-- End Client Item -->

            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Features Section -->
    <section class="features section" id="">

        <!-- Section Title -->
        <div class="section-title container" data-aos="fade-up">
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
                                        Build your perfect meal from the ground up. Select your protein, carbs, veggies, and
                                        even cooking methods. Whether you're on a keto, plant-based, or balanced diet, we've
                                        got options tailored to your goals and taste.
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
                                        Fresh meals, delivered fast. We ship daily to major cities like Jakarta, Bandung,
                                        and Surabaya using temperature-controlled packaging to ensure your meals arrive just
                                        the way they should — fresh and ready.
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
                                        Every meal includes a full nutrition profile, so you can track your intake with
                                        confidence. From calories to macronutrients, we provide the details you need to make
                                        informed decisions.
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul><!-- End Tab Nav -->

                </div>

                <div class="col-lg-6">

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                        <div class="tab-pane fade active show" id="features-tab-1">
                            <img class="img-fluid" src="{{ asset('/img/ingredients1.jpg') }}" alt="">
                        </div><!-- End Tab Content Item -->

                    </div>

                </div>

            </div>

    </section><!-- /Features Section -->

    <!-- Services Section -->
    <section class="services section light-background" id="">

        <!-- Section Title -->
        <div class="section-title container" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Bringing health, flavor, and convenience together — discover how SEA Catering helps you eat better every day.
            </p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-5">

                <!-- Meal Customization -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <i class="bi bi-sliders icon"></i>
                        <div>
                            <h3>Meal Customization</h3>
                            <p>Build your meals your way. Choose ingredients, portions, and preferences that match your
                                lifestyle and dietary goals.</p>
                        </div>
                    </div>
                </div>

                <!-- Nationwide Delivery -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <i class="bi bi-truck icon"></i>
                        <div>
                            <h3>Nationwide Delivery</h3>
                            <p>We deliver to Jakarta, Bandung, Surabaya, and more — with reliable, temperature-controlled
                                packaging for guaranteed freshness.</p>
                        </div>
                    </div>
                </div>

                <!-- Nutritional Info -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                        <i class="bi bi-clipboard-data icon"></i>
                        <div>
                            <h3>Nutritional Transparency</h3>
                            <p>Track what you eat with detailed macros, calories, and ingredient breakdowns on every meal we
                                offer.</p>
                        </div>
                    </div>
                </div>

                <!-- Weekly & Monthly Plans -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-calendar-check icon"></i>
                        <div>
                            <h3>Weekly & Monthly Plans</h3>
                            <p>Stay consistent with flexible subscription plans. Perfect for individuals, families, or
                                office teams looking to eat healthy long-term.</p>
                        </div>
                    </div>
                </div>

                <!-- Locally Sourced Ingredients -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-basket icon"></i>
                        <div>
                            <h3>Local, Fresh Ingredients</h3>
                            <p>We partner with trusted local farmers and markets to bring you the freshest ingredients in
                                every meal.</p>
                        </div>
                    </div>
                </div>

                <!-- Personalized Support -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-chat-dots icon"></i>
                        <div>
                            <h3>Personalized Support</h3>
                            <p>Got questions about your meal plan or nutrition? Our support team is ready to help you make
                                the most of every bite.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Testimonials Section -->
    <section class="testimonials section light-background" id="testimonials">

        <!-- Section Title -->
        <div class="section-title container" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <div class="swiper-wrapper">

                    {{-- foreach start --}}
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">

                                    @switch($testimonial->rating)
                                        @case(1)
                                            <i class="bi bi-star-fill"></i>
                                        @break

                                        @case(2)
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        @break

                                        @case(3)
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        @break

                                        @case(4)
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                        @break

                                        @case(5)
                                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                class="bi bi-star-fill"></i>
                                        @break

                                        @default
                                    @endswitch
                                </div>
                                <p>{{ $testimonial->review }}</p>
                                <div class="profile mt-auto">
                                    <h3>{{ $testimonial->name }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- foreach end --}}
                </div>
                <div class="swiper-pagination"></div>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Testimonial Section -->
    <section class="contact section" id="testimonials_form">

        <!-- Section Title -->
        <div class="section-title container" data-aos="fade-up">
            <h2>Testimonial Form</h2>
            <p>Share your experiences with SEA Catering. We'd love to hear from you!</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('img/meal6.jpg') }}" alt="{{ asset('img/ingredients6.jpg') }}" width="500px">
                </div>

                <div class="col-lg-6">
                    {{-- @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button class="close" data-dismiss="alert" type="button">&times;</button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button class="close" data-dismiss="alert" type="button">&times;</button>
                        </div>
                    @endif --}}

                    <form class="" data-aos="fade-up" data-aos-delay="400"
                        action="{{ route('testimonial.store') }}" method="post">
                        @csrf
                        <div class="row gy-4">

                            <!-- Customer Name -->
                            <div class="col-md-12">
                                <input class="form-control" name="name" type="text" placeholder="Your Name"
                                    required="">
                            </div>

                            <!-- Review Message -->
                            <div class="col-md-12">
                                <textarea class="form-control" name="review" rows="5" placeholder="Your Review Message" required=""></textarea>
                            </div>

                            <!-- Rating -->
                            <div class="col-md-12">
                                <label class="form-label" for="rating">Rating</label>
                                <select class="form-select" name="rating" required="">
                                    <option value="" disabled selected>Choose rating</option>
                                    <option value="5">★★★★★ - Excellent</option>
                                    <option value="4">★★★★☆ - Very Good</option>
                                    <option value="3">★★★☆☆ - Good</option>
                                    <option value="2">★★☆☆☆ - Fair</option>
                                    <option value="1">★☆☆☆☆ - Poor</option>
                                </select>
                            </div>

                            @guest
                                <button class="btn btn-primary disabled" type="submit">Login to Submit Review</button>

                            @endguest
                            @auth
                                <button class="btn btn-primary" type="submit">Submit Review</button>

                            @endauth
                        </div>

                </div>
                </form>
            </div><!-- End Review Form -->

        </div>

        </div>

    </section><!-- /Testimonial Section -->
@endsection


@push('scripts')
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        new Swiper('.init-swiper', {
            loop: true,
            speed: 600,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });
    </script>
@endpush
