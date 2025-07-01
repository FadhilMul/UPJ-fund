@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
<div class="container py-5">

    {{-- Top Section --}}
    <div class="row mb-5">
        {{-- Left: Image + Title --}}
        <div class="col-md-6">
            <img src="{{ $campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/600x400/C4C4C4/FFF?text=No+Image' }}"
                 alt="{{ $campaign->title }}"
                 class="img-fluid rounded mb-3"
                 style="max-height: 400px; object-fit: cover; width: 100%;">
            <h2 class="fw-bold">{{ $campaign->title }}</h2>
        </div>

        {{-- Right: Info --}}
        <div class="col-md-6">
            <p><strong>Tanggal Dibuat:</strong> {{ $campaign->created_at->format('d M Y') }}</p>
            <p><strong>Target Donasi:</strong> Rp{{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
            <p><strong>Sudah Terkumpul:</strong> Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</p>
            <p><strong>Donatur:</strong> {{ $campaign->donations_count ?? 0 }}</p>
            <p><strong>Jumlah Share:</strong> 0 </p>
            <p><strong>Waktu Tersisa:</strong> 
                @php
                    use Carbon\Carbon;

                    $now = Carbon::now();
                    $end = Carbon::parse($campaign->end_date);

                    if ($end->isPast()) {
                        $remainingText = 'Berakhir';
                    } elseif ($end->isToday()) {
                        $remainingText = 'Hari ini terakhir';
                    } elseif ($now->diffInDays($end) <= 7) {
                        $remainingText = $end->diffInDays($now) . ' hari lagi';
                    } else {
                        $diff = $now->diff($end);
                        $months = $diff->m;
                        $days = $diff->d;
                        $parts = [];
                        if ($diff->y > 0) $parts[] = $diff->y . ' tahun';
                        if ($months > 0) $parts[] = $months . ' bulan';
                        if ($days > 0) $parts[] = $days . ' hari';
                        $remainingText = 'Berakhir dalam ' . implode(' ', $parts);
                    }
                @endphp
                {{ $remainingText }}

            </p>

            <p><strong>Penggalang Dana:</strong> {{ $campaign->user->name }}</p>

            <div class="d-grid gap-2 mt-4">
                <a href="{{ route('donation.form', $campaign->id) }}" class="btn btn-green btn-lg">Donasi Sekarang</a>
                <a href="#" class="btn btn-outline-secondary btn-sm">Bagikan Campaign</a>
            </div>
        </div>
    </div>

    {{-- Tab Section --}}
    <ul class="nav nav-tabs mb-4" id="campaignTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">Deskripsi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="update-tab" data-bs-toggle="tab" data-bs-target="#update" type="button" role="tab">Update</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="comment-tab" data-bs-toggle="tab" data-bs-target="#comment" type="button" role="tab">Komentar</button>
        </li>
    </ul>

    <div class="tab-content" id="campaignTabContent">
        {{-- Tab: Deskripsi --}}
        <div class="tab-pane fade show active" id="desc" role="tabpanel">
            <p>{{ $campaign->description }}</p>
        </div>

        {{-- Tab: Update --}}
        <div class="tab-pane fade" id="update" role="tabpanel">
            @auth
                @if (Auth::id() === $campaign->user_id)
                    <a href="{{ route('campaign.update.create', $campaign->id) }}" class="btn btn-sm btn-outline-success mb-3">+ Tambah Update</a>
                @endif
            @endauth

            @forelse ($campaign->updates as $update)
                <div class="mb-4 p-3 border rounded bg-white">
                    <h5 class="fw-bold">{{ $update->title }}</h5>
                    <p class="mb-1 text-muted">{{ $update->created_at->format('d M Y') }}</p>
                    <p>{{ $update->content }}</p>
                    @if ($update->image)
                        <img src="{{ asset('storage/updates/' . $update->image) }}" class="img-fluid rounded mt-2" style="max-height: 300px;" alt="Update image">
                    @endif
                </div>
            @empty
                <p class="text-muted">Belum ada update.</p>
            @endforelse
        </div>

        {{-- Tab: Komentar --}}
        <div class="tab-pane fade" id="comment" role="tabpanel">
            <p>Belum ada komentar.</p>
            {{-- Nanti bisa pakai form dan daftar komentar dari database --}}
        </div>
    </div>
</div>
@endsection
