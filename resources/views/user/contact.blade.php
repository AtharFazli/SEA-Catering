<!-- Contact.blade.php -->
@extends('landing.layouts.master')

@section('title')
    SEA Catering | Contact
@endsection

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="d-lg-flex justify-content-between align-items-center container">
        </div>
    </div><!-- End Page Title -->

    <!-- Get in Touch Section -->
    <div class="container mb-5 mt-5 pt-5">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <h3 class="card-title mb-4" style="color: #449eb7;">Get in Touch</h3>
                        <p class="text-muted mb-4">We're Indonesia's premier customizable healthy meal service. Tell us how
                            we can help you with your healthy eating journey!</p>


                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" for="name">Full Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" type="text" value="{{ old('name') }}"
                                        placeholder="Enter your name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" for="email">Email Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" type="email" value="{{ old('email') }}"
                                        placeholder="Enter your email" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" for="phone">Phone Number</label>
                                    <input class="form-control @error('phone') is-invalid @enderror" id="phoneNumber"
                                        name="phone" type="tel" value="{{ old('phone') }}"
                                        placeholder="Enter your phone number" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" for="city">City</label>
                                    <input class="form-control @error('city') is-invalid @enderror" id="city"
                                        name="city" type="text" value="{{ old('city') }}"
                                        placeholder="Enter your city" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold" for="subject">Subject</label>
                                <select class="@error('subject') is-invalid @enderror form-select" id="subject"
                                    name="subject">
                                    <option value="">Select a subject</option>
                                    <option value="Meal Inquiry" {{ old('subject') == 'Meal Inquiry' ? 'selected' : '' }}>
                                        Meal
                                        Inquiry</option>
                                    <option value="Delivery Question"
                                        {{ old('subject') == 'Delivery Question' ? 'selected' : '' }}>Delivery Question
                                    </option>
                                    <option value="Customization Request"
                                        {{ old('subject') == 'Customization Request' ? 'selected' : '' }}>Customization
                                        Request
                                    </option>
                                    <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>
                                        Partnership</option>
                                    <option value="Feedback" {{ old('subject') == 'Feedback' ? 'selected' : '' }}>Feedback
                                    </option>
                                    <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold" for="message">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5"
                                    placeholder="Tell us how we can help you..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-lg w-100" type="submit"
                                style="background-color: #449eb7; border-color: #449eb7; color: white;">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4" style="color: #449eb7;">Contact Information</h4>

                        <div class="mb-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3 mt-1" style="color: #449eb7;">
                                    <i class="fas fa-map-marker-alt fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark">Head Office</h6>
                                    <p class="text-muted mb-0">
                                        Jl. Daan Mogot No.KM. 11 1<br>
                                        Jakarta Barat 11710<br>
                                        Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3 mt-1" style="color: #449eb7;">
                                    <i class="fas fa-phone fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark">Phone</h6>
                                    <p class="text-muted mb-0">+62 812 3456 789</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3 mt-1" style="color: #449eb7;">
                                    <i class="fas fa-envelope fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark">Email</h6>
                                    <p class="text-muted mb-0">seacatering@mail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3 mt-1" style="color: #449eb7;">
                                    <i class="fas fa-clock fa-lg"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark">Business Hours</h6>
                                    <p class="text-muted mb-0">
                                        Monday - Friday: 8:00 AM - 4:00 PM<br>
                                        Saturday: 9:00 AM - 2:00 PM<br>
                                        Sunday: Closed
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h6 class="fw-bold text-dark mb-3">Follow Us</h6>
                            <div class="d-flex gap-3">
                                <a class="text-decoration-none" href="https://github.com/atharfazli"
                                    aria-label="Facebook" style="color: #449eb7;" target="_blank">
                                    <i class="bi bi-github fs-4"></i>
                                </a>
                                <a class="text-decoration-none" href="https://instagram.com/athar_fazli"
                                    aria-label="Instagram" style="color: #449eb7;" target="_blank">
                                    <i class="bi bi-instagram fs-4"></i>
                                </a>
                                <a class="text-decoration-none" href="https://wa.me/6287816098777" aria-label="WhatsApp"
                                    style="color: #449eb7;" target="_blank">
                                    <i class="bi bi-whatsapp fs-4"></i>
                                </a>
                                <a class="text-decoration-none" href="https://x.com/atharfazli" aria-label="Twitter"
                                    style="color: #449eb7;" target="_blank">
                                    <i class="bi bi-twitter-x fs-4"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Features Card -->
                <div class="card mt-4 border-0 shadow">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4" style="color: #449eb7;">Why Choose SEA Catering?</h5>

                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3" style="color: #449eb7;">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Meal Customization</h6>
                                    <small class="text-muted">Personalize meals to your dietary needs</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3" style="color: #449eb7;">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Nationwide Delivery</h6>
                                    <small class="text-muted">Fresh meals delivered across Indonesia</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="d-flex align-items-start">
                                <div class="me-3" style="color: #449eb7;">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Detailed Nutrition Info</h6>
                                    <small class="text-muted">Complete nutritional breakdown for every meal</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
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

        // SweetAlert untuk feedback
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
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
@endpush
