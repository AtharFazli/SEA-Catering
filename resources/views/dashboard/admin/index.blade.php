@extends('dashboard.layouts.master')

@section('title')
    Dashboard | SEA Catering
@endsection

@section('styles')
    <style>
        @media print {

            .no-print,
            nav,
            aside,
            .btn,
            form {
                display: none !important;
            }

            body {
                margin: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h2 class="mb-4">Admin Dashboard</h2>

        <!-- Date Range Selector -->
        <form class="row g-3 mb-4" method="GET">
            <div class="col-md-4">
                <label class="form-label" for="start_date">Start Date</label>
                <input class="form-control" id="start_date" name="start_date" type="date"
                    value="{{ request('start_date', $start->toDateString()) }}">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="end_date">End Date</label>
                <input class="form-control" id="end_date" name="end_date" type="date"
                    value="{{ request('end_date', $end->toDateString()) }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>
        </form>

        <div class="row">

            <!-- New Subscriptions -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
                                    New Subscriptions</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $newSubscriptions }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Monthly Recurring Revenue -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-success text-uppercase mb-1 text-xs">
                                    MRR</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">Rp{{ number_format($mrr, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reactivations -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-info text-uppercase mb-1 text-xs">
                                    Reactivations</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $reactivations }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-redo-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Subscriptions -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning h-100 py-2 shadow">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-warning text-uppercase mb-1 text-xs">
                                    Active Subscriptions</div>
                                <div class="h5 font-weight-bold mb-0 text-gray-800">{{ $activeSubscriptions }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Print and Export Buttons --}}
        <div class="d-flex justify-content-end no-print mb-3 gap-2">
            <a class="btn btn-success" href="{{ route('admin.export.csv', request()->all()) }}">Export CSV</a>
            <button class="btn btn-secondary" onclick="window.print()">Print Report</button>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header d-flex align-items-center justify-content-between flex-row py-3">
                        <h6 class="font-weight-bold text-primary m-0">Subscriptions Growth</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated--fade-in shadow"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            {{-- <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const ctx = document.getElementById("myAreaChart").getContext("2d");

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dailyLabels) !!}, // ['01 Jun', '02 Jun', ...]
                datasets: [{
                    label: 'Active Subscriptions per Day',
                    data: {!! json_encode($dailyData) !!}, // [1, 2, 3, ...]
                    backgroundColor: "rgba(78, 115, 223, 0.1)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
