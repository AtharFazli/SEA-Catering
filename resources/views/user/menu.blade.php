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
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item h-100">
                        <h3>Diet Plan</h3>
                        <p class="description">Ideal for calorie-conscious individuals. Enjoy balanced meals designed to
                            support weight management and a healthy lifestyle.</p>
                        <h4><sup>Rp</sup>30K<span> / Meal</span></h4>
                        <a class="cta-btn" data-bs-toggle="modal" data-bs-target="#dietPlanModal" href="#">See
                            Detail</a>

                    </div>
                </div><!-- End Pricing Item -->

                <!-- Protein Plan -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item featured h-100">
                        <p class="popular">Popular</p>
                        <h3>Protein Plan</h3>
                        <p class="description">Perfect for active lifestyles and fitness enthusiasts. Packed with lean
                            proteins and nutrients to fuel your day.</p>
                        <h4><sup>Rp</sup>40K<span> / Meal</span></h4>
                        <a class="cta-btn" data-bs-toggle="modal" data-bs-target="#proteinPlanModal" href="#">See
                            Detail</a>

                    </div>
                </div><!-- End Pricing Item -->

                <!-- Royal Plan -->
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-item h-100">
                        <h3>Royal Plan</h3>
                        <p class="description">Get the full experience with access to premium dishes, exclusive add-ons, and
                            priority support for a luxurious meal journey.</p>
                        <h4><sup>Rp</sup>60K<span> / Meal</span></h4>
                        <a class="cta-btn" data-bs-toggle="modal" data-bs-target="#royalPlanModal" href="#">See
                            Detail</a>
                    </div>
                </div><!-- End Pricing Item -->

            </div>
        </div>

    </section><!-- /Pricing Section -->

    <!-- Diet Plan Modal -->
    <div class="modal fade" id="dietPlanModal" aria-labelledby="dietPlanModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dietPlanModalLabel">Diet Plan Details</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Price:</strong> Rp30.000 / Meal</p>
                    <p><strong>Overview:</strong> Ideal for those aiming to lose or maintain weight. This plan emphasizes
                        low-calorie meals with optimal nutrition to support a healthy lifestyle.</p>
                    <ul>
                        <li><i class="bi bi-heart-pulse-fill text-danger me-2"></i>Calorie-controlled, portioned meals</li>
                        <li><i class="bi bi-graph-up-arrow text-primary me-2"></i>Balanced macros with focus on fiber and
                            healthy fats</li>
                        <li><i class="bi bi-emoji-smile text-warning me-2"></i>Light yet satisfying menu items</li>
                        <li><i class="bi bi-clock-history text-info me-2"></i>Includes options for Breakfast, Lunch, and
                            Dinner</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                        style="background-color: #388da8;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Protein Plan Modal -->
    <div class="modal fade" id="proteinPlanModal" aria-labelledby="proteinPlanModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proteinPlanModalLabel">Protein Plan Details</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Price:</strong> Rp40.000 / Meal</p>
                    <p><strong>Overview:</strong> Designed for fitness enthusiasts and those focused on muscle growth or
                        recovery. Each meal is high in protein and perfectly portioned for energy and strength.</p>
                    <ul>
                        <li><i class="bi bi-fire text-danger me-2"></i>High-protein meals for active lifestyles</li>
                        <li><i class="bi bi-truck text-primary me-2"></i>Free delivery for weekly subscribers</li>
                        <li><i class="bi bi-lightning-charge text-warning me-2"></i>Balanced carbs and healthy fats for
                            performance</li>
                        <li><i class="bi bi-bag-check text-success me-2"></i>Meal options: Breakfast, Lunch, and Dinner</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                        style="background-color: #388da8;">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Royal Plan Modal -->
    <div class="modal fade" id="royalPlanModal" aria-labelledby="royalPlanModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="royalPlanModalLabel">Royal Plan Details</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Price:</strong> Rp60.000 / Meal</p>
                    <p><strong>Overview:</strong> Our premium plan for those who want it all — top-tier meals, chef’s
                        specials, exclusive dishes, and one-on-one nutritionist support.</p>
                    <ul>
                        <li><i class="bi bi-stars text-warning me-2"></i>Access to exclusive & gourmet meal selections</li>
                        <li><i class="bi bi-person-badge text-primary me-2"></i>One-on-one nutritional consultation</li>
                        <li><i class="bi bi-rocket-takeoff text-danger me-2"></i>Priority delivery and support</li>
                        <li><i class="bi bi-calendar2-day-fill text-info me-2"></i>Full-day meal options (Breakfast, Lunch,
                            Dinner)</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                        style="background-color: #388da8;">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
