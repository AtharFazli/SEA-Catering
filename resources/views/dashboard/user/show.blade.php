@extends('dashboard.layouts.master')

@section('title', 'Dashboard Show | SEA Catering')

@section('styles')
    <style>
        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .bg-orange {
            background-color: #fd7e14 !important;
        }

        .badge-lg {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }

        .border-left-success {
            border-left: 0.25rem solid #1cc88a !important;
        }

        .border-left-warning {
            border-left: 0.25rem solid #f6c23e !important;
        }

        .border-left-danger {
            border-left: 0.25rem solid #e74a3b !important;
        }

        .info-item {
            padding: 0.75rem 0;
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .font-weight-medium {
            font-weight: 500;
        }

        .list-group-item {
            padding: 0.75rem 1rem;
        }

        .list-group-item:hover {
            background-color: #f8f9fc;
        }

        .address-container {
            line-height: 1.4;
        }

        .address-container p {
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-clipboard-list text-primary mr-2"></i>
                Detail Subscription
            </h1>
        </div>

        <!-- Subscription Status Banner -->
        <div class="row mb-4">
            <div class="col-12">
                @if ($subscription->status == 'active')
                    <div class="alert alert-success border-left-success" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x text-success mr-3"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Subscription Active</h6>
                                <p class="mb-0">Your meal subscription is currently active and running smoothly.</p>
                            </div>
                        </div>
                    </div>
                @elseif ($subscription->status == 'paused')
                    <div class="alert alert-warning border-left-warning" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-pause-circle fa-2x text-warning mr-3"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Subscription Paused</h6>
                                <p class="mb-0">Your subscription is temporarily paused. Resume anytime!</p>
                            </div>
                        </div>
                    </div>
                @elseif ($subscription->status == 'cancelled')
                    <div class="alert alert-danger border-left-danger" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-times-circle fa-2x text-danger mr-3"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Subscription Cancelled</h6>
                                <p class="mb-0">This subscription has been cancelled.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- Customer Information Card -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-gradient-success text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user mr-2"></i>
                            <h6 class="font-weight-bold m-0">Customer's Information</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-primary mr-3 text-white">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Full Name</small>
                                    <h6 class="font-weight-bold mb-0">{{ $subscription->full_name }}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-info mr-3 text-white">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Phone Number</small>
                                    <h6 class="font-weight-bold mb-0">{{ $subscription->phone_number }}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="d-flex align-items-start mb-2">
                                <div class="icon-circle bg-warning mr-3 text-white">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <small class="text-muted">Address</small>
                                    <div class="address-container">
                                        <p class="font-weight-bold text-dark mb-1">
                                            {{ $subscription->province }}, {{ $subscription->city }}
                                        </p>
                                        <p class="text-muted mb-1">
                                            {{ $subscription->district }}, {{ $subscription->sub_district }}
                                        </p>
                                        <p class="text-muted mb-1">
                                            {{ $subscription->postal_code }}
                                        </p>
                                        <p class="font-weight-medium text-dark mb-0">
                                            {{ $subscription->street_address }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subscription Information Card -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-gradient-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            <h6 class="font-weight-bold m-0">Subscription's Detail</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-primary mr-3 text-white">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Plan</small>
                                    <h6 class="font-weight-bold mb-0">{{ $subscription->plan->name }}</h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-success mr-3 text-white">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Price / Meal</small>
                                    <h6 class="font-weight-bold text-success mb-0">
                                        Rp{{ number_format($subscription->plan->price_per_meal, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-danger mr-3 text-white">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Total Price</small>
                                    <h6 class="font-weight-bold text-danger mb-0">
                                        Rp{{ number_format($totalPrice, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <div
                                    class="icon-circle @if ($subscription->status == 'active') bg-success
                                @elseif ($subscription->status == 'paused') bg-warning
                                @elseif ($subscription->status == 'cancelled') bg-danger @endif mr-3 text-white">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Status</small>
                                    <div>
                                        @if ($subscription->status == 'active')
                                            <span class="badge badge-success badge-lg">
                                                <i class="fas fa-check mr-1"></i>Active
                                            </span>
                                        @elseif ($subscription->status == 'paused')
                                            <span class="badge badge-warning badge-lg">
                                                <i class="fas fa-pause mr-1"></i>Paused
                                            </span>
                                        @elseif ($subscription->status == 'cancelled')
                                            <span class="badge badge-danger badge-lg">
                                                <i class="fas fa-times mr-1"></i>Cancelled
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="warning-item">
                            <div class="d-flex align-items-center mb-2">
                                <div class="icon-circle bg-warning mr-3 text-white">
                                    <i class="fas fa-ban"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Allergies</small>
                                    <h6 class="font-weight-bold mb-0">
                                        {{ $subscription->allergies ?? 'None' }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Meal Types & Delivery Days -->
            <div class="col-lg-6">
                <!-- Meal Types Card -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-gradient-info text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-utensils mr-2"></i>
                            <h6 class="font-weight-bold m-0">Meal's Types</h6>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($subscription->mealTypes as $meal)
                                <div class="list-group-item d-flex align-items-center border-0">
                                    <div class="icon-circle bg-orange mr-3 text-white"
                                        style="width: 30px; height: 30px; font-size: 12px;">
                                        <i class="fas fa-concierge-bell"></i>
                                    </div>
                                    <span class="font-weight-medium">-{{ $meal->name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Delivery Days Card -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-header bg-gradient-warning text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-truck mr-2"></i>
                            <h6 class="font-weight-bold m-0">Delivery Days</h6>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach ($subscription->deliveryDays as $day)
                                <div class="list-group-item d-flex align-items-center border-0">
                                    <div class="icon-circle bg-secondary mr-3 text-white"
                                        style="width: 30px; height: 30px; font-size: 12px;">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <span class="font-weight-medium">{{ ucfirst($day->name) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
