@extends('dashboard.layouts.master')

@section('title')
    Dashboard | SEA Catering
@endsection

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="card mb-4 shadow">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="font-weight-bold text-primary m-0">Langganan Aktif</h6>
        </div>
        <div class="card-body">
            @if ($subscriptions->isEmpty())
                <p>Tidak ada langganan aktif.</p>
            @else
                <div class="table-responsive">
                    <table class="table-bordered table" id="datatable">
                        <thead>
                            <tr>
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
                                    <td>{{ $sub->plan->name }}</td>
                                    <td>{{ $sub->mealTypes->pluck('name')->implode(', ') }}</td>
                                    <td>{{ $sub->deliveryDays->pluck('name')->implode(', ') }}</td>
                                    <td>Rp{{ number_format($sub->plan->price_per_meal * $sub->mealTypes->count() * $sub->deliveryDays->count(), 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <span
                                            class="badge badge-{{ $sub->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($sub->status) }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm mb-3" data-toggle="modal"
                                            data-target="#pauseModal" data-id="{{ $sub->id }}">
                                            Pause
                                        </button>
                                        <form class="d-inline" action="{{ route('subscriptions.cancel', $sub->id) }}"
                                            method="POST"
                                            onsubmit="console.log('Submitting cancel form...'); return confirm('Yakin ingin membatalkan langganan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Cancel</button>
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
    <div class="modal fade" id="pauseModal" aria-labelledby="pauseModalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('subscriptions.pause.submit') }}" method="POST">
                @csrf
                <input id="pauseSubscriptionId" name="subscription_id" type="hidden">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pause Langganan</h5>
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                    </div>
                    <div class="modal-body">
                        <label for="pause_start">Mulai Tanggal:</label>
                        <input class="form-control mb-2" name="pause_start" type="date" required>
                        <label for="pause_end">Sampai Tanggal:</label>
                        <input class="form-control" name="pause_end" type="date" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function() {
            $("#datatable").DataTable({
                dom: "fltp"
            });
        })
    </script>

    <script>
        $('#pauseModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let subscriptionId = button.data('id');
            $(this).find('#pauseSubscriptionId').val(subscriptionId);
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif

        // Alert handling
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
            const today = new Date().toISOString().split('T')[0]; // Format YYYY-MM-DD
            const startInput = document.querySelector('[name="pause_start"]');
            const endInput = document.querySelector('[name="pause_end"]');

            startInput.min = today;
            endInput.min = today;

            // Opsional: end date tidak boleh sebelum start date
            startInput.addEventListener('change', function() {
                endInput.min = this.value;
            });
        });
    </script>
@endpush
