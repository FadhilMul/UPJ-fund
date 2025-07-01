@extends('layouts.app')

@section('title', 'Daftar Campaign')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center">Jelajahi <span class="text-success">Campaign</span></h2>

    <form method="GET" action="{{ route('campaign.index') }}" class="d-flex flex-wrap justify-content-center align-items-center gap-2 mb-4">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari campaign..." style="max-width: 250px;">
        
        <select name="category" class="form-select" style="max-width: 200px;">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        
        <button class="btn btn-success" type="submit" style="min-width: 100px;">Filter</button>
        <a href="{{ route('campaign.index') }}" class="btn btn-outline-secondary" style="min-width: 100px;">Reset</a>
    </form>


    {{-- Grid Campaign --}}
    <div class="row g-4">
        @forelse($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card h-100 d-flex flex-column justify-content-between">
                    <img src="{{ $campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/320x200/C4C4C4/FFF?text=No+Image' }}"
                         class="card-img-top" style="width:100%; height: 200px; object-fit: cover;"
                         alt="{{ $campaign->title }}">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title fw-bold">
                            <a href="{{ route('campaign.show', $campaign->id) }}" class="text-dark text-decoration-none">
                                {{ $campaign->title }}
                            </a>
                        </h5>
                        <p class="small text-muted mb-1"><strong>{{ $campaign->category->name ?? '-' }}</strong></p>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($campaign->description, 100) }}</p>
                        <p class="small text-muted">Terkumpul: <strong>Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</strong></p>
                        <a href="{{ route('campaign.show', $campaign->id) }}" class="btn btn-green mt-auto">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada campaign yang tersedia.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $campaigns->withQueryString()->links() }}
    </div>
</div>
@endsection
