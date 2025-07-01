@extends('layouts.app')

@section('title', 'How It Works - UPJfund')

@section('content')
{{-- Hero Section --}}
<section class="text-white text-center" style="background: linear-gradient(to right, #74C69D, #449f76); padding: 100px 0;">
    <div class="container">
        <h1 class="display-4 fw-bold">Bagaimana Cara Kerja <span class="text-light">UPJfund?</span></h1>
        <p class="lead mt-3">Panduan lengkap untuk Donatur dan Penggalang Dana</p>
        <div class="mt-4">
            <a href="{{ route('campaign.index') }}" class="btn btn-light btn-lg me-2">Mulai Donasi</a>
            <a href="{{ route('campaign.create') }}" class="btn btn-outline-light btn-lg">Buat Campaign</a>
        </div>
    </div>
</section>

{{-- Untuk Donatur --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Cara Berdonasi di UPJfund</h2>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-green mb-3">1</div>
                    <h5 class="fw-semibold">Pilih Campaign</h5>
                    <p class="text-muted">Telusuri berbagai campaign berdasarkan kategori dan kebutuhan.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-green mb-3">2</div>
                    <h5 class="fw-semibold">Klik Donasi</h5>
                    <p class="text-muted">Tekan tombol "Donasi Sekarang" pada campaign yang kamu pilih.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-green mb-3">3</div>
                    <h5 class="fw-semibold">Isi Nominal & Data</h5>
                    <p class="text-muted">Masukkan jumlah donasi, data diri, dan pesan (opsional).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-green mb-3">4</div>
                    <h5 class="fw-semibold">Selesaikan Pembayaran</h5>
                    <p class="text-muted">Pilih metode pembayaran, lakukan transfer, dan bantu wujudkan impian mereka.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Untuk Penggalang Dana --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Cara Membuat Campaign di UPJfund</h2>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-success mb-3">1</div>
                    <h5 class="fw-semibold">Login / Register</h5>
                    <p class="text-muted">Buat akun baru atau masuk ke akun kamu terlebih dahulu.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-success mb-3">2</div>
                    <h5 class="fw-semibold">Klik "Buat Campaign"</h5>
                    <p class="text-muted">Isi form campaign dengan lengkap, termasuk deskripsi, target, dan thumbnail.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-success mb-3">3</div>
                    <h5 class="fw-semibold">Publikasi & Sebarkan</h5>
                    <p class="text-muted">Bagikan campaign kamu ke media sosial untuk menjangkau lebih banyak donatur.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 border rounded h-100">
                    <div class="display-5 fw-bold text-success mb-3">4</div>
                    <h5 class="fw-semibold">Pantau & Update</h5>
                    <p class="text-muted">Cek perkembangan campaign dan buat update agar donatur tetap terhubung.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA Akhir --}}
<section class="py-5 text-white text-center" style="background: linear-gradient(to right, #72d8a6, #449f76);">
    <div class="container">
        <h3 class="fw-bold mb-3">Siap Berkontribusi?</h3>
        <p class="lead mb-4">Bantu sesama, wujudkan perubahan hari ini juga.</p>
        <a href="{{ route('campaign.index') }}" class="btn btn-light btn-lg me-2">Donasi Sekarang</a>
        <a href="{{ route('campaign.create') }}" class="btn btn-outline-light btn-lg">Buat Campaign</a>
    </div>
</section>
@endsection