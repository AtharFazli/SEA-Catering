@extends('dashboard.layouts.master')

@section('title', 'Dashboard | SEA Catering')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

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

    <div class="card mb-4 shadow">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="font-weight-bold text-primary m-0">Cancelled Subscriptions</h6>
        </div>
        <div class="card-body">
            @include('dashboard.layouts.error')

            @if ($cancelledSubscriptions->isEmpty())
                <p>There's no cancelled subscription.</p>
            @else
                <div class="table-responsive">
                    <table class="table-bordered table" id="datatable-cancelled">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Plan's Name</th>
                                <th>Meal Types</th>
                                <th>Delivery Days</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cancelledSubscriptions as $cancel)
                                <tr>
                                    <td>{{ $loop->iteration }}. </td>
                                    <td>{{ $cancel->plan->name }}</td>
                                    <td>{{ $cancel->mealTypes->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $cancel->deliveryDays->pluck('name')->implode(', ') }}</td>
                                    <td>
                                        Rp{{ number_format($cancel->plan->price_per_meal * $cancel->mealTypes->count() * $cancel->deliveryDays->count() * 4.3, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">
                                            {{ ucfirst($cancel->status) }}
                                            {{ '(' . \Carbon\Carbon::parse($cancel->ended_at)->format('d-m-Y') . ')' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm btn-reactivate" data-id="{{ $cancel->id }}">
                                            Reactivate
                                        </button>

                                        <form id="reactivate-form-{{ $cancel->id }}" style="display: none;"
                                            action="{{ route('reactivate.reactivated', $cancel->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                        </form>
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
            $('#datatable-cancelled').DataTable({
                dom: 'Bfltp',
                order: []
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
        });
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
            const buttons = document.querySelectorAll('.btn-reactivate');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Reactivate Subscription?',
                        text: 'Subscription will be reactivated.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reactivate it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('reactivate-form-' + id).submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
