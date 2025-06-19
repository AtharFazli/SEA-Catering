@extends('landing.layouts.master')

@section('title')
    SEA Catering | Meal Plans
@endsection

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container d-lg-flex justify-content-between align-items-center">
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
    <p class="description">Ideal for calorie-conscious individuals. Enjoy balanced meals designed to support weight management and a healthy lifestyle.</p>
    <h4><sup>Rp</sup>30K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">See Deatail</a>
  </div>  
</div><!-- End Pricing Item -->

<!-- Protein Plan -->
<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
  <div class="pricing-item featured h-100">
    <p class="popular">Popular</p>
    <h3>Protein Plan</h3>
    <p class="description">Perfect for active lifestyles and fitness enthusiasts. Packed with lean proteins and nutrients to fuel your day.</p>
    <h4><sup>Rp</sup>40K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">See Deatail</a>
  </div>  
</div><!-- End Pricing Item -->

<!-- Royal Plan -->
<div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
  <div class="pricing-item h-100">
    <h3>Royal Plan</h3>
    <p class="description">Get the full experience with access to premium dishes, exclusive add-ons, and priority support for a luxurious meal journey.</p>
    <h4><sup>Rp</sup>60K<span> / Meal</span></h4>
    <a class="cta-btn" href="#">See Deatail</a>
  </div>  
</div><!-- End Pricing Item -->


    </div>
  </div>

</section><!-- /Pricing Section -->

@endsection
