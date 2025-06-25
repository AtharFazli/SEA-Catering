@extends('landing.layouts.master')

@section('title')
    SEA Catering
@endsection

@push('styles')
    <style>
        /* Enhanced Hero Section - KEEPING ORIGINAL COLORS */
        .hero.section {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* Background Enhancements - No color changes */
        .hero-bg {
            z-index: -3;
        }

        .hero-bg-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        .hero:hover .hero-bg-img {
            transform: scale(1.05);
        }

        .hero-gradient-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            z-index: -2;
        }

        /* Food Pattern Overlay */
        .food-pattern-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
        }

        .pattern-circle {
            position: absolute;
            font-size: 2rem;
            opacity: 0.1;
            animation: patternFloat 8s ease-in-out infinite;
        }

        .pattern-1 {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .pattern-2 {
            top: 20%;
            right: 15%;
            animation-delay: 1s;
        }

        .pattern-3 {
            bottom: 30%;
            left: 20%;
            animation-delay: 2s;
        }

        .pattern-4 {
            top: 60%;
            right: 10%;
            animation-delay: 3s;
        }

        .pattern-5 {
            bottom: 20%;
            right: 25%;
            animation-delay: 4s;
        }

        .pattern-6 {
            top: 40%;
            left: 5%;
            animation-delay: 5s;
        }

        @keyframes patternFloat {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(20px, -20px) rotate(120deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(240deg);
            }
        }

        /* Typography - Keep original colors */
        .hero-title {
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 2rem;
            position: relative;
        }

        .hero-title-line {
            display: block;
            font-size: 0.6em;
            font-weight: 400;
            opacity: 0.8;
            margin-bottom: 0.5rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero-title-brand {
            display: block;
            background: linear-gradient(45deg, #333, #666);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            z-index: 1;
        }

        .hero-title-underline {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #333, transparent);
            animation: slideIn 1s ease-out 0.5s both;
        }

        @keyframes slideIn {
            from {
                width: 0;
            }

            to {
                width: 100px;
            }
        }

        /* Typewriter Effect */
        .hero-subtitle {
            font-size: clamp(1.1rem, 3vw, 1.4rem);
            opacity: 0.9;
            position: relative;
            margin-bottom: 2rem;
        }

        .typewriter {
            overflow: hidden;
            border-right: 2px solid;
            white-space: nowrap;
            animation: typing 4s steps(60, end), blink-caret 0.75s step-end infinite;
            animation-delay: 1s;
            animation-fill-mode: both;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: currentColor;
            }
        }

        /* Hero Stats */
        .hero-stats {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 0.5rem;
        }

        .stat-number {
            display: block;
            font-size: 2rem;
            font-weight: 800;
            color: inherit;
            line-height: 1;
        }

        .stat-label {
            display: block;
            font-size: 0.9rem;
            opacity: 0.7;
            margin-top: 0.25rem;
        }

        .stat-divider {
            opacity: 0.3;
            font-size: 1.5rem;
        }

        /* Enhanced CTA Button - Keep original style */
        .hero-cta-wrapper {
            margin-bottom: 3rem;
            text-align: center;
        }

        .btn-get-started-enhanced {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 15px 40px;
            background: linear-gradient(45deg, #333, #555);
            color: white;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 1rem;
        }

        .btn-get-started-enhanced:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            color: white;
        }

        .btn-text {
            position: relative;
            z-index: 2;
            margin-right: 10px;
        }

        .btn-icon {
            transition: transform 0.3s ease;
            z-index: 2;
            position: relative;
        }

        .btn-get-started-enhanced:hover .btn-icon {
            transform: translateX(5px);
        }

        .btn-ripple {
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-get-started-enhanced:hover .btn-ripple {
            left: 100%;
        }

        .cta-note {
            opacity: 0.7;
            font-style: italic;
        }

        /* Food Showcase Grid - Replacing original hero image */
        .food-showcase {
            position: relative;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .food-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            aspect-ratio: 1;
            background: #f8f9fa;
        }

        .food-item:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .food-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .food-item:hover .food-img {
            transform: scale(1.1);
        }

        .food-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 1rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .food-item:hover .food-overlay {
            transform: translateY(0);
        }

        .food-name {
            font-weight: 600;
            font-size: 1rem;
        }

        /* Floating Food Icons */
        .floating-food-icons {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
        }

        .floating-icon {
            position: absolute;
            font-size: 2rem;
            animation: iconFloat 6s ease-in-out infinite;
        }

        .icon-1 {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .icon-2 {
            top: 20%;
            right: 15%;
            animation-delay: 1.5s;
        }

        .icon-3 {
            bottom: 30%;
            left: 20%;
            animation-delay: 3s;
        }

        .icon-4 {
            bottom: 20%;
            right: 10%;
            animation-delay: 4.5s;
        }

        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(180deg);
            }
        }

        /* Scroll Indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            opacity: 0.7;
            animation: bounce 2s infinite;
        }

        .scroll-mouse {
            width: 24px;
            height: 40px;
            border: 2px solid currentColor;
            border-radius: 12px;
            position: relative;
        }

        .scroll-wheel {
            width: 4px;
            height: 8px;
            background: currentColor;
            border-radius: 2px;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translateX(-50%);
            animation: scrollWheel 1.5s infinite;
        }

        @keyframes scrollWheel {
            0% {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateX(-50%) translateY(16px);
            }
        }

        .scroll-text {
            font-size: 0.9rem;
            font-weight: 300;
            letter-spacing: 1px;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        /* Animated Food Particles */
        .food-particles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            overflow: hidden;
        }

        .particle-food {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.3;
            animation: particleFloat 10s linear infinite;
        }

        .particle-food:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .particle-food:nth-child(2) {
            left: 25%;
            animation-delay: 2s;
        }

        .particle-food:nth-child(3) {
            left: 45%;
            animation-delay: 4s;
        }

        .particle-food:nth-child(4) {
            left: 65%;
            animation-delay: 6s;
        }

        .particle-food:nth-child(5) {
            left: 80%;
            animation-delay: 8s;
        }

        .particle-food:nth-child(6) {
            left: 90%;
            animation-delay: 10s;
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.3;
            }

            90% {
                opacity: 0.3;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-stats {
                gap: 1rem;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .food-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .btn-get-started-enhanced {
                padding: 12px 30px;
                font-size: 1rem;
            }

            .floating-icon {
                font-size: 1.5rem;
            }

            .pattern-circle {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                margin-bottom: 1.5rem;
            }

            .hero-subtitle {
                margin-bottom: 1.5rem;
            }

            .hero-stats {
                margin-bottom: 2rem;
                flex-direction: column;
                gap: 1rem;
            }

            .hero-cta-wrapper {
                margin-bottom: 2rem;
            }

            .food-grid {
                grid-template-columns: 1fr;
            }

            .stat-divider {
                display: none;
            }
        }

        /* Loading placeholder for images */
        .food-item::before {
            content: "🍽️";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            opacity: 0.3;
            z-index: -1;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero section position-relative overflow-hidden" id="hero">
        <!-- Background with Food Theme -->
        <div class="hero-bg position-absolute w-100 h-100">
            <img class="hero-bg-img" src="{{ asset('img/bg-hero.jpg') }}" alt="SEA Catering Background">

            <!-- Food Pattern Overlay -->
            <div class="food-pattern-overlay">
                <div class="pattern-circle pattern-1">🍽️</div>
                <div class="pattern-circle pattern-2">🥗</div>
                <div class="pattern-circle pattern-3">🍜</div>
                <div class="pattern-circle pattern-4">🥘</div>
                <div class="pattern-circle pattern-5">🍱</div>
                <div class="pattern-circle pattern-6">🧑‍🍳</div>
            </div>

            <div class="hero-gradient-overlay"></div>
        </div>

        <div class="position-relative container text-center">
            <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
                <h1 class="hero-title mb-4" data-aos="fade-up">
                    <span class="hero-title-line">🍽️ Welcome to</span>
                    <span class="hero-title-brand">SEA Catering</span>
                    <div class="hero-title-underline"></div>
                </h1>

                <!-- Subtitle with Food Theme -->
                <p class="hero-subtitle mb-4" data-aos="fade-up" data-aos-delay="100">
                    <span class="typewriter">🥗 Healthy Meals, Anytime, Anywhere • 🚚 Fast Delivery</span>
                </p>

                <!-- Food Stats -->
                <div class="hero-stats" data-aos="fade-up" data-aos-delay="150">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Happy Customers</span>
                    </div>
                    <div class="stat-divider">|</div>
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Menu Varieties</span>
                    </div>
                    <div class="stat-divider">|</div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Service</span>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="hero-cta-wrapper" data-aos="fade-up" data-aos-delay="200">
                    <a class="btn-get-started-enhanced" href="{{ route('mealplans.index') }}">
                        <span class="btn-text">🛒 Get Yours Now</span>
                        <div class="btn-ripple"></div>
                        <i class="fas fa-arrow-right btn-icon"></i>
                    </a>
                </div>

                <!-- Food Showcase -->
                <div class="food-showcase" data-aos="zoom-out" data-aos-delay="300">
                    <div class="food-grid">
                        <!-- Replace original hero-services-img with food images -->
                        <div class="food-item food-item-1">
                            <img class="food-img" src="{{ asset('/img/salad.jpg') }}"
                                alt="Fresh Healthy Salads">
                            <div class="food-overlay">
                                <span class="food-name">Fresh Salads</span>
                            </div>
                        </div>
                        <div class="food-item food-item-2">
                            <img class="food-img" src="{{ asset('/img/asian.jpg') }}"
                                alt="Delicious Asian Cuisine">
                            <div class="food-overlay">
                                <span class="food-name">Asian Fusion</span>
                            </div>
                        </div>
                        <div class="food-item food-item-3">
                            <img class="food-img" src="{{ asset('/img/lunch-box.jpg') }}"
                                alt="Premium Lunch Box">
                            <div class="food-overlay">
                                <span class="food-name">Lunch Boxes</span>
                            </div>
                        </div>
                        <div class="food-item food-item-4">
                            <img class="food-img" src="{{ asset('/img/catering.jpg') }}"
                                alt="Premium Catering Set">
                            <div class="food-overlay">
                                <span class="food-name">Catering Sets</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Food Icons -->
                    <div class="floating-food-icons">
                        <div class="floating-icon icon-1">🥗</div>
                        <div class="floating-icon icon-2">🍜</div>
                        <div class="floating-icon icon-3">🍱</div>
                        <div class="floating-icon icon-4">🥘</div>
                    </div>
                </div>

                <!-- Scroll Indicator -->
                <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="500">
                    <div class="scroll-mouse">
                        <div class="scroll-wheel"></div>
                    </div>
                    <span class="scroll-text">Explore Our Menu</span>
                </div>
            </div>
        </div>

        <!-- Animated Food Particles -->
        <div class="food-particles">
            <div class="particle-food">🍽️</div>
            <div class="particle-food">🥗</div>
            <div class="particle-food">🍜</div>
            <div class="particle-food">🍱</div>
            <div class="particle-food">🥘</div>
            <div class="particle-food">🧑‍🍳</div>
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
                            <h4 class="title"><a class="stretched-link" href="#">Detailed Nutritional
                                    Information</a>
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
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-1.png') }}"
                        alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-2.png') }}"
                        alt="">
                </div><!-- End Client Item -->

                <div class="col-xl-2 col-md-3 col-6 client-logo">
                    <img class="img-fluid" src="{{ asset('/QuickStart/assets/img/clients/client-3.png') }}"
                        alt="">
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
                            <h3>Weekly Plans</h3>
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
            <p>What our customers say about SEA Catering</p>
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
                    <img src="{{ asset('img/testi-bg.png') }}" alt="Testimonial Background" class="img-fluid w-100 rounded">
                </div>

                <div class="col-lg-6">
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
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects for food items
            const foodItems = document.querySelectorAll('.food-item');

            foodItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.05)';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add click animation for CTA button
            const ctaButton = document.querySelector('.btn-get-started-enhanced');
            if (ctaButton) {
                ctaButton.addEventListener('click', function(e) {
                    const ripple = this.querySelector('.btn-ripple');
                    ripple.style.left = '-100%';
                    setTimeout(() => {
                        ripple.style.left = '100%';
                    }, 100);
                });
            }
        });
    </script>
@endpush
