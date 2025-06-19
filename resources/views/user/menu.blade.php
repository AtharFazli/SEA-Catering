@extends('landing.layouts.master')

@section('title')
    SEA Catering | Meal Plans
@endsection

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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-{{ $plan->id }}">{{ $plan->name }} Details</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Price:</strong> Rp{{ number_format($plan->price_per_meal, 0, ',', '.') }} per meal</p>
                        <p><strong>Overview:</strong> {{ $plan->description }}</p>
                        @switch($loop->iteration)
                            @case(1)
                                <ul>
                                    <li><i class="bi bi-heart-pulse-fill text-danger me-2"></i>Calorie-controlled, portioned meals
                                    </li>
                                    <li><i class="bi bi-graph-up-arrow text-primary me-2"></i>Balanced macros with focus on fiber
                                        and healthy fats</li>
                                    <li><i class="bi bi-emoji-smile text-warning me-2"></i>Light yet satisfying menu items</li>
                                    <li><i class="bi bi-clock-history text-info me-2"></i>Includes options for Breakfast, Lunch, and
                                        Dinner</li>
                                </ul>
                            @break

                            @case(2)
                                <ul>
                                    <li><i class="bi bi-fire text-danger me-2"></i>High-protein meals for active lifestyles</li>
                                    <li><i class="bi bi-truck text-primary me-2"></i>Free delivery for weekly subscribers</li>
                                    <li><i class="bi bi-lightning-charge text-warning me-2"></i>Balanced carbs and healthy fats for
                                        performance</li>
                                    <li><i class="bi bi-bag-check text-success me-2"></i>Meal options: Breakfast, Lunch, and Dinner
                                    </li>
                                </ul>
                            @break

                            @case(3)
                                <ul>
                                    <li><i class="bi bi-stars text-warning me-2"></i>Access to exclusive & gourmet meal selections
                                    </li>
                                    <li><i class="bi bi-person-badge text-primary me-2"></i>One-on-one nutritional consultation</li>
                                    <li><i class="bi bi-rocket-takeoff text-danger me-2"></i>Priority delivery and support</li>
                                    <li><i class="bi bi-calendar2-day-fill text-info me-2"></i>Full-day meal options (Breakfast,
                                        Lunch, Dinner)</li>
                                </ul>
                            @break

                            @default
                        @endswitch
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                            style="background-color: #388da8;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
