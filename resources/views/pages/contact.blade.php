@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center">Hubungi Kami</h2>

    <div class="row">
        <div class="col-md-6 mb-4">
            <h5 class="mb-3">Informasi Kontak</h5>
            <p><i class="bi bi-geo-alt-fill me-2 text-success"></i> Universitas Pembangunan Jaya, Bintaro, Tangerang Selatan</p>
            <p><i class="bi bi-envelope-fill me-2 text-success"></i> support@upjfund.com</p>
            <p><i class="bi bi-telephone-fill me-2 text-success"></i> +62 812 3456 7890</p>
        </div>

        <div class="col-md-6">
            <h5 class="mb-3">Kirim Pesan</h5>
            <form>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" placeholder="Email Anda">
                </div>
                <div class="mb-3">
                    <label class="form-label">Pesan</label>
                    <textarea class="form-control" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn btn-green">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection