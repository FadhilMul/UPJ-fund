@extends('layouts.app')

@section('title', 'Dashboard Saya')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Dashboard Saya</h2>

    @if($campaigns->isEmpty())
        <div class="alert alert-info text-center">
            <p>Anda belum memiliki campaign apapun.</p>
            <a href="{{ route('campaign.create') }}" class="btn btn-success mt-2">Buat Campaign Pertama</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Judul</th>
                        <th>Terkumpul</th>
                        <th>Donasi</th>
                        <th>Batas Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaigns->where('status', 'approved') as $campaign)
                        <tr>
                            <td>{{ $campaign->title }}</td>
                            <td>Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</td>
                            <td>{{ $campaign->donations_count }}</td>
                            <td>{{ \Carbon\Carbon::parse($campaign->end_date)->format('d M Y') }}</td>
                            <td>
                                @if(\Carbon\Carbon::now()->gt($campaign->end_date))
                                    <span class="badge bg-danger">Berakhir</span>
                                @else
                                    <span class="badge bg-success">Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('campaign.show', $campaign->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                                {{-- <a href="{{ route('campaign.edit', $campaign->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a> --}}
                                <a href="{{ route('campaign.update.create', $campaign->id) }}" class="btn btn-sm btn-outline-success">Tambah Update</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection