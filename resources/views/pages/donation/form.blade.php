@extends('layouts.app')

@section('title', 'Donasi untuk ' . $campaign->title)

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Donasi ke: <span class="text-success">{{ $campaign->title }}</span></h2>

    <form action="{{ route('donation.process', $campaign->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="donor_name" class="form-label">Nama Anda (opsional)</label>
            <input type="text" class="form-control" name="donor_name" placeholder="Anonim jika dikosongkan">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah Donasi (Rp)</label>
            <input type="number" class="form-control" name="amount" required min="10000" placeholder="Min. Rp10.000">
        </div>

        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" class="form-select" required>
                <option value="">Pilih Metode</option>
                <option value="bank_transfer">Transfer Bank (BCA)</option>
                <option value="gopay">GoPay</option>
                <option value="ovo">OVO</option>
                <option value="qris">QRIS</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Pesan/Kesan (opsional)</label>
            <textarea name="note" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-green">Bayar Sekarang</button>
    </form>
</div>
@endsection