@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-4">Tentang <span class="text-success">UPJfund</span></h2>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <p class="lead">
                UPJfund adalah platform crowdfunding kampus yang dibangun untuk membantu sivitas akademika Universitas Pembangunan Jaya dalam menggalang dana, baik untuk kegiatan sosial, pendidikan, medis, maupun kemanusiaan.
            </p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <i class="bi bi-bullseye text-success display-5 mb-3"></i>
            <h5 class="fw-bold">Misi Kami</h5>
            <p>Menjadi penghubung antara mereka yang membutuhkan dengan para donatur yang peduli dalam lingkungan kampus.</p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="bi bi-eye text-success display-5 mb-3"></i>
            <h5 class="fw-bold">Visi Kami</h5>
            <p>Menumbuhkan semangat gotong royong dan empati di kalangan mahasiswa dan warga kampus melalui teknologi digital.</p>
        </div>
        <div class="col-md-4 mb-4">
            <i class="bi bi-people text-success display-5 mb-3"></i>
            <h5 class="fw-bold">Tim Pengembang</h5>
            <p>UPJfund dikembangkan oleh mahasiswa Universitas Pembangunan Jaya sebagai proyek akhir semester dengan semangat profesionalisme.</p>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('campaign.index') }}" class="btn btn-green px-4 py-2">Lihat Campaign</a>
    </div>
</div>
@endsection