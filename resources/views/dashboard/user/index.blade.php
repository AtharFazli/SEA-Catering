@extends('dashboard.layouts.master')

@section('title', 'Dashboard | SEA Catering')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="card mb-4 shadow">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="font-weight-bold text-primary m-0">Langganan Aktif</h6>
        </div>
        <div class="card-body">
            @include('dashboard.layouts.error')

            @if ($subscriptions->isEmpty())
                <p>Tidak ada langganan aktif.</p>
            @else
                <div class="table-responsive">
                    <table class="table-bordered table" id="datatable">
                        <thead>
                            <tr>
                                @role('admin')
                                <th>No</th>
                                @endrole
                                <th>Nama Paket</th>
                                <th>Jenis Makanan</th>
                                <th>Hari Kirim</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#pauseModal"
                                            onclick="document.getElementById('pause-subscription-id').value = '{{ $sub->id }}'">
                                            Pause
                                        </button>

                                        <form class="d-inline cancel-subscription-form" data-id="{{ $sub->id }}"
                                            action="{{ route('subscriptions.cancel', $sub->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Cancel</button>
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
            $('#datatable').DataTable({
                dom: 'fltp',
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
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.cancel-subscription-form');

            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // stop default form

                    Swal.fire({
                        title: 'Yakin?',
                        text: "Langganan akan dibatalkan secara permanen.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, batalkan!',
                        cancelButtonText: 'Batal'
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
