@extends('landing.layouts.master')

@section('title')
    SEA Catering | Subscriptions
@endsection

@push('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2/dist/js/select2.min.js"></script>

    <style>
        .page-title {
            margin-top: 3rem;
            padding-top: 4rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            border: 1px solid #e3f2fd;
        }

        .section-title {
            color: #333;
            font-weight: 600;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e3f2fd;
        }

        .plan-card {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--bs-primary);
        }

        .plan-card.selected {
            border-color: var(--bs-primary);
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(13, 110, 253, 0.05));
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.2);
        }

        .meal-option,
        .day-option {
            display: flex;
            align-items: center;
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .meal-option:hover,
        .day-option:hover {
            border-color: var(--bs-primary);
            background: rgba(13, 110, 253, 0.05);
        }

        .meal-option.selected,
        .day-option.selected {
            border-color: var(--bs-primary);
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(13, 110, 253, 0.05));
        }

        .meal-option input,
        .day-option input {
            margin-right: 0.5rem;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--bs-primary);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 2px solid #e9ecef;
            border-right: none;
            background-color: #f8f9fa;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .input-group:focus-within .input-group-text {
            border-color: var(--bs-primary);
        }

        .price-summary {
            border: 2px solid #e3f2fd !important;
        }

        .btn-primary {
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(13, 110, 253, 0.3);
        }
    </style>
@endpush

@section('content')
    {{-- <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold text-primary mb-3">
                    </h1>
                </div>
            </div>
        </div>
    </div><!-- End Page Title --> --}}

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold text-primary mb-3">
                        <i class="bi bi-basket3-fill me-3"></i>Meal Plan Subscription
                    </h1>
                    <p class="lead text-muted">Customize your perfect meal plan and get healthy, delicious meals delivered
                        to
                        your door</p>
                </div>
            </div>
        </div>
    </div><!-- End Page Title -->

    <!-- Subscription Form Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="form-container shadow-lg">
                        <div class="form-body p-lg-5 p-4">
                            <form id="subscriptionForm" action="{{ route('subscriptions.store') }}" method="POST"
                                novalidate>
                                @csrf

                                <!-- Personal Information -->
                                <div class="mb-5">
                                    <h4 class="section-title mb-4">
                                        <i class="bi bi-person-circle text-primary me-2"></i>Personal Information
                                    </h4>

                                    <div class="row">
                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-semibold" for="fullName">Full Name <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                                <input class="form-control @error('full_name') is-invalid @enderror"
                                                    id="fullName" name="full_name" type="text"
                                                    value="{{ old('full_name') }}" required>
                                            </div>
                                            @error('full_name')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Please provide your full name.</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 mb-5">
                                            <label class="form-label fw-semibold" for="phoneNumber">Active Phone Number
                                                <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                                <input class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="phoneNumber" name="phone_number" type="tel"
                                                    value="{{ old('phone_number') }}" required>
                                            </div>
                                            <small class="form-text text-muted">We'll use this for payment and order
                                                updates</small>
                                            @error('phone_number')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @else
                                                <div class="invalid-feedback">Please provide a valid phone number.</div>
                                            @enderror
                                        </div>

                                        <!-- Address Cascading Select -->
                                        <div class="mb-5">
                                            <h4 class="section-title mb-3"><i
                                                    class="bi bi-geo-alt text-primary me-2"></i>Delivery Address</h4>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label>Province *</label>
                                                    <select class="form-select" id="province" name="province"
                                                        required></select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>City / Regency *</label>
                                                    <select class="form-select" id="city" name="city" required
                                                        disabled></select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>District (Kecamatan) *</label>
                                                    <select class="form-select" id="district" name="district" required
                                                        disabled></select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Sub-district (Kelurahan) *</label>
                                                    <select class="form-select" id="sub_district" name="sub_district"
                                                        required disabled></select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Postal Code *</label>
                                                    <input class="form-control" name="postal_code" required readonly />
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Street Address *</label>
                                                    <textarea class="form-control" name="street_address" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Plan Selection -->
                                <div class="mb-5">
                                    <h4 class="section-title mb-4">
                                        <i class="bi bi-card-checklist text-primary me-2"></i>Plan Selection <span
                                            class="text-danger">*</span>
                                    </h4>

                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div class="plan-card h-100 {{ old('plan') == 'diet' ? 'selected' : '' }}"
                                                data-plan="diet" data-price="30000">
                                                <input class="form-check-input d-none" id="dietPlan" name="plan"
                                                    type="radio" value="diet"
                                                    {{ old('plan') == 'diet' ? 'checked' : '' }} required>
                                                <div class="p-4 text-center">
                                                    <i class="bi bi-heart-pulse display-4 text-success mb-3"></i>
                                                    <h5 class="fw-bold mb-2">Diet Plan</h5>
                                                    <p class="text-muted small mb-3">Balanced nutrition for healthy living
                                                    </p>
                                                    <div class="plan-price h4 text-primary mb-0">Rp30.000</div>
                                                    <small class="text-muted">per meal</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="plan-card h-100 {{ old('plan') == 'protein' ? 'selected' : '' }}"
                                                data-plan="protein" data-price="40000">
                                                <input class="form-check-input d-none" id="proteinPlan" name="plan"
                                                    type="radio" value="protein"
                                                    {{ old('plan') == 'protein' ? 'checked' : '' }} required>
                                                <div class="p-4 text-center">
                                                    <i class="bi bi-lightning-charge display-4 text-warning mb-3"></i>
                                                    <h5 class="fw-bold mb-2">Protein Plan</h5>
                                                    <p class="text-muted small mb-3">High-protein meals for active
                                                        lifestyle
                                                    </p>
                                                    <div class="plan-price h4 text-primary mb-0">Rp40.000</div>
                                                    <small class="text-muted">per meal</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="plan-card h-100 {{ old('plan') == 'royal' ? 'selected' : '' }}"
                                                data-plan="royal" data-price="60000">
                                                <input class="form-check-input d-none" id="royalPlan" name="plan"
                                                    type="radio" value="royal"
                                                    {{ old('plan') == 'royal' ? 'checked' : '' }} required>
                                                <div class="p-4 text-center">
                                                    <i class="bi bi-gem display-4 text-danger mb-3"></i>
                                                    <h5 class="fw-bold mb-2">Royal Plan</h5>
                                                    <p class="text-muted small mb-3">Premium ingredients and gourmet
                                                        experience</p>
                                                    <div class="plan-price h4 text-primary mb-0">Rp60.000</div>
                                                    <small class="text-muted">per meal</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @error('plan')
                                        <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                                    @else
                                        <div class="invalid-feedback d-block" id="planError"
                                            style="display: none !important;">Please select a meal plan.</div>
                                    @enderror
                                </div>

                                <!-- Meal Type Selection -->
                                <div class="mb-5">
                                    <h4 class="section-title mb-3">
                                        <i class="bi bi-clock-history text-primary me-2"></i>Meal Type <span
                                            class="text-danger">*</span>
                                    </h4>
                                    <p class="text-muted mb-4">Select at least one meal type</p>

                                    <div class="row g-3">
                                        <div class="col-lg-4">
                                            <div
                                                class="meal-option {{ in_array('breakfast', old('meal_types', [])) ? 'selected' : '' }}">
                                                <input class="form-check-input" id="breakfast" name="meal_types[]"
                                                    type="checkbox" value="breakfast"
                                                    {{ in_array('breakfast', old('meal_types', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label d-flex align-items-center" for="breakfast">
                                                    <i class="bi bi-sunrise text-warning fs-4 me-2"></i>
                                                    <span class="fw-semibold">Breakfast</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div
                                                class="meal-option {{ in_array('lunch', old('meal_types', [])) ? 'selected' : '' }}">
                                                <input class="form-check-input" id="lunch" name="meal_types[]"
                                                    type="checkbox" value="lunch"
                                                    {{ in_array('lunch', old('meal_types', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label d-flex align-items-center" for="lunch">
                                                    <i class="bi bi-sun text-success fs-4 me-2"></i>
                                                    <span class="fw-semibold">Lunch</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div
                                                class="meal-option {{ in_array('dinner', old('meal_types', [])) ? 'selected' : '' }}">
                                                <input class="form-check-input" id="dinner" name="meal_types[]"
                                                    type="checkbox" value="dinner"
                                                    {{ in_array('dinner', old('meal_types', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label d-flex align-items-center" for="dinner">
                                                    <i class="bi bi-moon-stars text-primary fs-4 me-2"></i>
                                                    <span class="fw-semibold">Dinner</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    @error('meal_types')
                                        <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                                    @else
                                        <div class="invalid-feedback d-block" id="mealError"
                                            style="display: none !important;">Please select at least one meal type.</div>
                                    @enderror
                                </div>

                                <!-- Delivery Days -->
                                <div class="mb-5">
                                    <h4 class="section-title mb-3">
                                        <i class="bi bi-calendar-week text-primary me-2"></i>Delivery Days <span
                                            class="text-danger">*</span>
                                    </h4>
                                    <p class="text-muted mb-4">Choose your preferred delivery days</p>

                                    <div class="row g-2">
                                        @php
                                            $days = [
                                                'monday' => 'Monday',
                                                'tuesday' => 'Tuesday',
                                                'wednesday' => 'Wednesday',
                                                'thursday' => 'Thursday',
                                                'friday' => 'Friday',
                                                'saturday' => 'Saturday',
                                                'sunday' => 'Sunday',
                                            ];
                                        @endphp

                                        @foreach ($days as $value => $label)
                                            <div class="col-6 col-lg-3">
                                                <div
                                                    class="day-option {{ in_array($value, old('delivery_days', [])) ? 'selected' : '' }}">
                                                    <input class="form-check-input" id="{{ $value }}"
                                                        name="delivery_days[]" type="checkbox"
                                                        value="{{ $value }}"
                                                        {{ in_array($value, old('delivery_days', [])) ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-semibold"
                                                        for="{{ $value }}">{{ $label }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @error('delivery_days')
                                        <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                                    @else
                                        <div class="invalid-feedback d-block" id="daysError"
                                            style="display: none !important;">Please select at least one delivery day.</div>
                                    @enderror
                                </div>

                                <!-- Allergies -->
                                <div class="mb-5">
                                    <h4 class="section-title mb-3">
                                        <i class="bi bi-shield-exclamation text-primary me-2"></i>Allergies & Dietary
                                        Restrictions
                                    </h4>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-chat-text"></i></span>
                                        <textarea class="form-control @error('allergies') is-invalid @enderror" id="allergies" name="allergies"
                                            rows="3" placeholder="Please list any allergies or dietary restrictions (optional)">{{ old('allergies') }}</textarea>
                                    </div>
                                    <small class="form-text text-muted">This helps us customize your meals to your specific
                                        needs</small>
                                    @error('allergies')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Price Summary -->
                                <div class="price-summary bg-light rounded-3 mb-4 border p-4">
                                    <h5 class="text-primary mb-3">
                                        <i class="bi bi-calculator me-2"></i>Price Summary
                                    </h5>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Selected Plan:</span>
                                                <span class="text-muted" id="selectedPlan">None selected</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Meal Types:</span>
                                                <span class="text-muted" id="selectedMeals">None selected</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Delivery Days:</span>
                                                <span class="text-muted" id="selectedDays">None selected</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex justify-content-between">
                                                <span class="fw-semibold">Weekly Total:</span>
                                                <span class="fw-bold text-primary fs-5" id="weeklyTotal">Rp0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg px-5 py-3" type="submit">
                                        <i class="bi bi-check-circle me-2"></i>Subscribe Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('subscriptionForm');
            const planCards = document.querySelectorAll('.plan-card');
            const mealOptions = document.querySelectorAll('.meal-option');
            const dayOptions = document.querySelectorAll('.day-option');

            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true,
                    mirror: false
                });
            }

            // Plan selection handling
            planCards.forEach(card => {
                card.addEventListener('click', function() {
                    planCards.forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');

                    const radio = this.querySelector('input[type="radio"]');
                    radio.checked = true;

                    updatePriceSummary();
                });
            });

            // Meal option handling
            mealOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const checkbox = this.querySelector('input[type="checkbox"]');
                    checkbox.checked = !checkbox.checked;

                    if (checkbox.checked) {
                        this.classList.add('selected');
                    } else {
                        this.classList.remove('selected');
                    }

                    updatePriceSummary();
                });
            });

            // Day option handling
            dayOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const checkbox = this.querySelector('input[type="checkbox"]');
                    checkbox.checked = !checkbox.checked;

                    if (checkbox.checked) {
                        this.classList.add('selected');
                    } else {
                        this.classList.remove('selected');
                    }

                    updatePriceSummary();
                });
            });

            // Update price summary
            function updatePriceSummary() {
                const selectedPlan = document.querySelector('input[name="plan"]:checked');
                const selectedMeals = document.querySelectorAll('input[name="meal_types[]"]:checked');
                const selectedDays = document.querySelectorAll('input[name="delivery_days[]"]:checked');

                // Update plan display
                if (selectedPlan) {
                    const planName = selectedPlan.value.charAt(0).toUpperCase() + selectedPlan.value.slice(1) +
                        ' Plan';
                    document.getElementById('selectedPlan').textContent = planName;
                } else {
                    document.getElementById('selectedPlan').textContent = 'None selected';
                }

                // Update meals display
                if (selectedMeals.length > 0) {
                    const mealNames = Array.from(selectedMeals).map(meal =>
                        meal.value.charAt(0).toUpperCase() + meal.value.slice(1)
                    );
                    document.getElementById('selectedMeals').textContent = mealNames.join(', ');
                } else {
                    document.getElementById('selectedMeals').textContent = 'None selected';
                }

                // Update days display
                if (selectedDays.length > 0) {
                    const dayNames = Array.from(selectedDays).map(day =>
                        day.value.charAt(0).toUpperCase() + day.value.slice(1)
                    );
                    document.getElementById('selectedDays').textContent = dayNames.join(', ');
                } else {
                    document.getElementById('selectedDays').textContent = 'None selected';
                }

                // Calculate weekly total
                if (selectedPlan && selectedMeals.length > 0 && selectedDays.length > 0) {
                    const planPrice = parseInt(selectedPlan.closest('.plan-card').dataset.price);
                    const totalMeals = selectedMeals.length * selectedDays.length;
                    const weeklyTotal = planPrice * totalMeals * 4.3;

                    document.getElementById('weeklyTotal').textContent =
                        'Rp' + weeklyTotal.toLocaleString('id-ID');
                } else {
                    document.getElementById('weeklyTotal').textContent = 'Rp0';
                }
            }

            document.getElementById('phoneNumber').addEventListener('input', function(e) {
                let input = e.target.value;

                // Remove all non-digit characters, except leading "+"
                input = input.replace(/[^+\d]/g, '');

                // Normalize phone number
                if (input.startsWith('0')) {
                    input = '+62' + input.slice(1);
                } else if (input.startsWith('62')) {
                    input = '+62' + input.slice(2);
                } else if (!input.startsWith('+62')) {
                    input = '+62' + input.replace(/^\+?/, '');
                }

                // Limit length to avoid overflow (e.g., 15 digits max for Indonesian numbers)
                if (input.length > 15) {
                    input = input.slice(0, 15);
                }

                e.target.value = input;
            });


            // Form validation
            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Reset previous error states
                document.getElementById('planError').style.display = 'none';
                document.getElementById('mealError').style.display = 'none';
                document.getElementById('daysError').style.display = 'none';

                // Check required fields
                const selectedPlan = document.querySelector('input[name="plan"]:checked');
                const selectedMeals = document.querySelectorAll('input[name="meal_types[]"]:checked');
                const selectedDays = document.querySelectorAll('input[name="delivery_days[]"]:checked');

                // Validate plan
                if (!selectedPlan) {
                    document.getElementById('planError').style.display = 'block';
                    isValid = false;
                }

                // Validate meals
                if (selectedMeals.length === 0) {
                    document.getElementById('mealError').style.display = 'block';
                    isValid = false;
                }

                // Validate days
                if (selectedDays.length === 0) {
                    document.getElementById('daysError').style.display = 'block';
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    // Scroll to first error
                    const firstError = document.querySelector('.invalid-feedback[style*="block"]');
                    if (firstError) {
                        firstError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }
            });

            // Initialize price summary on page load
            updatePriceSummary();
        });
    </script>

    <script>
        $(() => {
            $('#province, #city, #district, #sub_district').select2({
                placeholder: 'Select...',
                allowClear: true,
                width: '100%'
            });

            function loadList(path, target) {
                const $sel = $(target);
                $sel.prop('disabled', true).empty().append('<option></option>');
                return $.getJSON(path, data => {
                    data.forEach(i => $sel.append(new Option(i.name, i.name)));
                    $sel.prop('disabled', false);
                }).fail(() => console.error('Load failed', path));
            }

            loadList('/data-indonesia/provinsi.json', '#province');

            $('#province').on('change', function() {
                const id = $(this).find(':selected').data('id') || $('#province option:selected').index();
                $('#city,#district,#sub_district').empty().trigger('change').prop('disabled', true);
                loadList(`{{ asset('data-indonesia/kabupaten') }}/${id}.json`, '#city');
            });

            $('#city').on('change', function() {
                const id = $('#city option:selected').data('id');
                $('#district,#sub_district').empty().trigger('change').prop('disabled', true);
                loadList(`{{ asset('data-indonesia/kecamatan') }}/${id}.json`, '#district');
            });

            $('#district').on('change', function() {
                const id = $('#district option:selected').data('id');
                $('#sub_district').empty().trigger('change').prop('disabled', true);
                loadList(`{{ asset('data-indonesia/kelurahan') }}/${id}.json`, '#sub_district');
            });

            $('#sub_district').on('change', function() {
                const code = $('#sub_district option:selected').data('postal_code');
                $('[name="postal_code"]').val(code);
            });
        });
    </script>

    <script>
        // Alert handling
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
