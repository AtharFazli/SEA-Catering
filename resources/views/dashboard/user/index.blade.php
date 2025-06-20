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
                    <table class="table-bordered table">
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
                                    <td>{{ $sub->plan_name }}</td>
                                    <td>{{ $sub->meal_types }}</td>
                                    <td>{{ $sub->delivery_days }}</td>
                                    <td>Rp{{ number_format($sub->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            class="badge badge-{{ $sub->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($sub->status) }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('subscriptions.pause', $sub->id) }}">Pause</a>
                                        <form class="d-inline" action="{{ route('subscriptions.cancel', $sub->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin membatalkan langganan ini?');">
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
        document.querySelectorAll('a[href*="subscriptions.pause"]').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const id = btn.getAttribute('href').split('/').pop();
                document.getElementById('pauseSubscriptionId').value = id;
                $('#pauseModal').modal('show');
            });
        });
    </script>
@endpush
