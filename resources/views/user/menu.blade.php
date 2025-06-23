{{-- @extends('landing.layouts.master')

@section('title')
    SEA Catering | Meal Plans
@endsection

@push('styles')
    <style>
        .premium-modal {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .premium-header {
            background: linear-gradient(135deg, #388da8 0%, #2c7a94 50%, #1a5d6e 100%);
            border: none;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .premium-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            z-index: 2;
        }

        .plan-badge {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .modal-title {
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 0;
        }

        .plan-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }

        .premium-body {
            padding: 2rem;
            background: linear-gradient(180deg, #fafafa 0%, #ffffff 100%);
        }

        .price-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .price-card {
            background: linear-gradient(135deg, #388da8, #2c7a94);
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            display: inline-block;
            position: relative;
            min-width: 250px;
            box-shadow: 0 10px 30px rgba(56, 141, 168, 0.3);
        }

        .price-label {
            font-size: 0.8rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .price-amount {
            font-size: 2rem;
            font-weight: 800;
            margin: 0.5rem 0;
        }

        .price-unit {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .value-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            color: #333;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
        }

        .section-title {
            color: #2c7a94;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .overview-section {
            margin-bottom: 2rem;
        }

        .overview-text {
            color: #555;
            line-height: 1.6;
            font-size: 1rem;
        }

        .features-section {
            margin-bottom: 2rem;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .feature-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            flex-shrink: 0;
        }

        /* Icon color variations */
        .feature-icon.diet {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .feature-icon.performance {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .feature-icon.satisfaction {
            background: linear-gradient(135deg, #f39c12, #e67e22);
        }

        .feature-icon.time {
            background: linear-gradient(135deg, #1abc9c, #16a085);
        }

        .feature-icon.power {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .feature-icon.delivery {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .feature-icon.energy {
            background: linear-gradient(135deg, #f39c12, #e67e22);
        }

        .feature-icon.complete {
            background: linear-gradient(135deg, #27ae60, #229954);
        }

        .feature-icon.exclusive {
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
        }

        .feature-icon.consultation {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .feature-icon.priority {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .feature-icon.fullday {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .feature-content h6 {
            margin: 0 0 0.5rem 0;
            color: #2c3e50;
            font-weight: 600;
            font-size: 1rem;
        }

        .feature-content p {
            margin: 0;
            color: #7f8c8d;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Royal plan special styling */
        .feature-grid.royal .feature-item {
            border-left-color: #9b59b6;
            background: linear-gradient(135deg, #fdf7ff, #ffffff);
        }

        .cta-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }

        .satisfaction-guarantee {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .cta-text {
            color: #6c757d;
            margin: 0;
            font-style: italic;
        }

        .premium-footer {
            background: #f8f9fa;
            border: none;
            padding: 1.5rem 2rem;
            justify-content: center;
            gap: 1rem;
        }

        .btn-premium {
            background: linear-gradient(135deg, #388da8, #2c7a94);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(56, 141, 168, 0.3);
        }

        .btn-premium:hover {
            background: linear-gradient(135deg, #2c7a94, #1a5d6e);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(56, 141, 168, 0.4);
            color: white;
        }

        .btn-outline-secondary {
            border: 2px solid #6c757d;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            transform: translateY(-1px);
        }

        /* Responsive adjustments */
        @media (min-width: 768px) {
            .feature-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-item {
            animation: fadeInUp 0.6s ease forwards;
        }

        .feature-item:nth-child(2) {
            animation-delay: 0.1s;
        }

        .feature-item:nth-child(3) {
            animation-delay: 0.2s;
        }

        .feature-item:nth-child(4) {
            animation-delay: 0.3s;
        }
    </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="d-lg-flex justify-content-between align-items-center container">
        </div>
    </div><!-- End Page Title -->

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
                @foreach ($plans as $plan)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="pricing-item {{ $loop->iteration == 2 ? 'featured' : '' }} h-100">
                            @if ($loop->iteration == 2)
                                <p class="popular">Popular</p>
                            @endif

                            <h3>{{ $plan->name }}</h3>
                            <p class="description">{{ $plan->description }}</p>
                            <h4><sup>Rp</sup>{{ number_format($plan->price_per_meal / 1000, 0) }}K<span> / Meal</span></h4>

                            <a class="cta-btn" data-bs-toggle="modal" data-bs-target="#modal-{{ $plan->id }}"
                                href="#">See Detail</a>
                        </div>
                    </div>
                @endforeach
                <!-- End Pricing Item -->

    </section><!-- /Pricing Section -->

    @foreach ($plans as $plan)
        <!-- Modal for {{ $plan->name }} -->
        <div class="modal fade" id="modal-{{ $plan->id }}" aria-labelledby="modalLabel-{{ $plan->id }}"
            aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content premium-modal">
                    <!-- Premium Header with Gradient -->
                    <div class="modal-header premium-header">
                        <div class="header-content">
                            <div class="plan-badge">
                                @switch($loop->iteration)
                                    @case(1)
                                        <i class="bi bi-heart-pulse-fill"></i>
                                    @break

                                    @case(2)
                                        <i class="bi bi-fire"></i>
                                    @break

                                    @case(3)
                                        <i class="bi bi-award-fill"></i>
                                    @break
                                @endswitch
                            </div>
                            <div>
                                <h4 class="modal-title mb-1" id="modalLabel-{{ $plan->id }}">{{ $plan->name }}</h4>
                                <p class="plan-subtitle mb-0">Premium Meal Experience</p>
                            </div>
                        </div>
                        <button class="btn-close btn-close-white" data-bs-dismiss="modal" type="button"
                            aria-label="Close"></button>
                    </div>

                    <!-- Enhanced Modal Body -->
                    <div class="modal-body premium-body">
                        <!-- Price Section with Visual Appeal -->
                        <div class="price-section">
                            <div class="price-card">
                                <div class="price-label">Starting from</div>
                                <div class="price-amount">Rp{{ number_format($plan->price_per_meal, 0, ',', '.') }}</div>
                                <div class="price-unit">per meal</div>
                                <div class="value-badge">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                    Best Value
                                </div>
                            </div>
                        </div>

                        <!-- Overview Section -->
                        <div class="overview-section">
                            <h6 class="section-title">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                What You Get
                            </h6>
                            <p class="overview-text">{{ $plan->description }}</p>
                        </div>

                        <!-- Features Section with Enhanced Icons -->
                        <div class="features-section">
                            <h6 class="section-title">
                                <i class="bi bi-star-fill me-2"></i>
                                Premium Features
                            </h6>

                            @switch($loop->iteration)
                                @case(1)
                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <div class="feature-icon diet">
                                                <i class="bi bi-heart-pulse-fill"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Calorie-Controlled</h6>
                                                <p>Perfectly portioned meals designed for your goals</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon performance">
                                                <i class="bi bi-graph-up-arrow"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Balanced Nutrition</h6>
                                                <p>Focus on fiber and healthy fats for optimal health</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon satisfaction">
                                                <i class="bi bi-emoji-smile"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Light & Satisfying</h6>
                                                <p>Delicious menu items that keep you energized</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon time">
                                                <i class="bi bi-clock-history"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>All-Day Options</h6>
                                                <p>Breakfast, Lunch, and Dinner covered</p>
                                            </div>
                                        </div>
                                    </div>
                                @break

                                @case(2)
                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <div class="feature-icon power">
                                                <i class="bi bi-fire"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>High-Protein Power</h6>
                                                <p>Fuel your active lifestyle with premium protein</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon delivery">
                                                <i class="bi bi-truck"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Free Delivery</h6>
                                                <p>Complimentary delivery for weekly subscribers</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon energy">
                                                <i class="bi bi-lightning-charge"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Performance Fuel</h6>
                                                <p>Balanced carbs and fats for peak performance</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon complete">
                                                <i class="bi bi-bag-check"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Complete Meals</h6>
                                                <p>Full day coverage: Breakfast, Lunch, Dinner</p>
                                            </div>
                                        </div>
                                    </div>
                                @break

                                @case(3)
                                    <div class="feature-grid royal">
                                        <div class="feature-item">
                                            <div class="feature-icon exclusive">
                                                <i class="bi bi-stars"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Exclusive Gourmet</h6>
                                                <p>Access to premium & exclusive meal selections</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon consultation">
                                                <i class="bi bi-person-badge"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Personal Nutritionist</h6>
                                                <p>One-on-one nutritional consultation included</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon priority">
                                                <i class="bi bi-rocket-takeoff"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Priority Service</h6>
                                                <p>Express delivery and dedicated support</p>
                                            </div>
                                        </div>
                                        <div class="feature-item">
                                            <div class="feature-icon fullday">
                                                <i class="bi bi-calendar2-day-fill"></i>
                                            </div>
                                            <div class="feature-content">
                                                <h6>Full-Day Luxury</h6>
                                                <p>Complete meal experience from dawn to dusk</p>
                                            </div>
                                        </div>
                                    </div>
                                @break
                            @endswitch
                        </div>

                        <!-- Call-to-Action Section -->
                        <div class="cta-section">
                            <div class="cta-content">
                                <div class="satisfaction-guarantee">
                                    <i class="bi bi-shield-check"></i>
                                    <span>100% Satisfaction Guarantee</span>
                                </div>
                                <p class="cta-text">Join thousands of satisfied customers who've transformed their meal
                                    experience</p>
                            </div>
                        </div>
                    </div>

                    <!-- Premium Footer -->
                    <div class="modal-footer premium-footer">
                        <button class="btn btn-outline-secondary me-2" data-bs-dismiss="modal" type="button">
                            Maybe Later
                        </button>
                        <a class="btn btn-premium" href="{{ route('subscriptions') }}">
                            <i class="bi bi-cart-plus-fill me-2"></i>
                            Choose This Plan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    
@endsection --}}
