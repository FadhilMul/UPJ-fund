@extends('layouts.app')

@section('title', 'Simulasi Pembayaran')

@section('content')
<div class="container py-5 text-center">
    <h2 class="fw-bold mb-3">Simulasi Pembayaran</h2>
    <p class="mb-4">Lakukan pembayaran ke rekening virtual berikut:</p>

    <div class="card p-4 mx-auto" style="max-width: 400px;">
        <h5 class="mb-2">Metode: {{ ucfirst($method) }}</h5>
        <p class="mb-1">Nominal: <strong>Rp{{ number_format($amount, 0, ',', '.') }}</strong></p>
        <p class="mb-1">VA/QR Code: <strong>1234-5678-9012</strong></p>
        <p class="text-muted mb-4">(Simulasi saja, tidak perlu benar-benar transfer)</p>

        <form action="{{ route('donation.confirm', $campaign->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
        </form>
    </div>
</div>
@endsection