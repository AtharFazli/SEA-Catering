@extends('dashboard.layouts.master')

@section('title', 'Dashboard | SEA Catering')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Active Subscriptions -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2 shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-primary text-uppercase mb-1 text-xs">
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

        <!-- Monthly Recurring Revenue -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2 shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold text-success text-uppercase mb-1 text-xs">
                                Total Price</div>
                            <div class="h5 font-weight-bold mb-0 text-gray-800">
                                Rp{{ number_format($totalPrice, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card mb-4 shadow">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="font-weight-bold text-primary m-0">Subscriptions</h6>
        </div>
        <div class="card-body">
            @include('dashboard.layouts.error')

            @if ($subscriptions->isEmpty())
                <p>There's no active subscription.</p>
            @else
                <div class="table-responsive">
                    <table class="table-bordered table-responsive table" id="datatable">
                        <thead>
                            <tr>
                                @role('admin')
                                    <th>No</th>
                                @endrole
                                <th>Plan's Name</th>
                                <th>Meal Types</th>
                                <th>Delivery Days</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $sub)
                                <tr>
                                    @role('admin')
                                        <td>{{ $loop->iteration }}. </td>
                                    @endrole
                                    <td>{{ $sub->plan->name }}</td>
                                    <td>{{ $sub->mealTypes->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $sub->deliveryDays->pluck('name')->implode(', ') }}</td>
                                    <td>
                                        Rp{{ number_format($sub->plan->price_per_meal * $sub->mealTypes->count() * $sub->deliveryDays->count() * 4.3, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $sub->status == 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($sub->status) }}
                                            @if ($sub->status == 'paused')
                                                {{ '(' . $sub->pause_start . ' - ' . $sub->pause_end . ')' }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                                type="button" aria-expanded="false">
                                                More
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('subscriptions.show', $sub->id) }}"><i
                                                        class="fas fa-info-circle mr-1"></i> Info</a>

                                                @if ($sub->status == 'active')
                                                    <button class="dropdown-item text-warning" data-toggle="modal"
                                                        data-target="#pauseModal"
                                                        onclick="document.getElementById('pause-subscription-id').value = '{{ $sub->id }}'">
                                                        <i class="fas fa-pause mr-1"></i> Pause
                                                    </button>

                                                    <form class="cancel-subscription-form" data-id="{{ $sub->id }}"
                                                        action="{{ route('subscriptions.cancel', $sub->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger" type="submit">
                                                            <i class="fas fa-trash-alt mr-1"></i> Cancel
                                                        </button>
                                                    </form>
                                                @elseif ($sub->status == 'paused')
                                                <form class="resume-subscription-form" action="{{ route('subscriptions.resume', $sub->id) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="dropdown-item text-success"><i
                                                        class="fas fa-play mr-1"></i> Resume</button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal Pause -->
    <div class="modal fade" id="pauseModal" role="dialog" aria-labelledby="pauseModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog" role="document">
            <form action="{{ route('subscriptions.pause.submit') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pause Subscription</h5>
                        <button class="close" data-dismiss="modal" type="button" aria-label="Tutup">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Pause Start</label>
                            <input class="form-control" name="pause_start" type="date" required>
                        </div>
                        <div class="form-group">
                            <label>Pause End</label>
                            <input class="form-control" name="pause_end" type="date" required>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input id="pause-subscription-id" name="subscription_id" type="hidden">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" type="submit">Pause</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                dom: 'fltp',
                order: []
            });
        });

        // Isi hidden input saat modal muncul
        $(document).ready(function() {
            $('#pauseModal').on('shown.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                console.log('ID langganan:', id);
                $('#pause-subscription-id').val(id);
                $('#debug-sub-id').text('[debug: ' + id + ']');
            });
        });


        // Set tanggal minimum hari ini
        const today = new Date().toISOString().split('T')[0];
        const startInput = document.querySelector('[name="pause_start"]');
        const endInput = document.querySelector('[name="pause_end"]');

        startInput.min = today;
        endInput.min = today;

        startInput.addEventListener('change', function() {
            endInput.min = this.value;
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.cancel-subscription-form');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // stop default form

                    Swal.fire({
                        title: 'Warning?',
                        text: "Are you sure want to cancel this subscription.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, cancel!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // submit form kalau OK
                        }
                    });
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.resume-subscription-form');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // stop default form

                    Swal.fire({
                        title: 'Warning?',
                        text: "Are you sure want to resume this subscription.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1cc88a',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, resume!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // submit form kalau OK
                        }
                    });
                });
            });
        });
    </script>
@endpush
