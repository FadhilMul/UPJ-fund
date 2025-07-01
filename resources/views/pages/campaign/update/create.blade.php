@extends('layouts.app')

@section('title', 'Tambah Update - ' . $campaign->title)

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Tambah Update untuk: <strong>{{ $campaign->title }}</strong></h3>

    <form method="POST" action="{{ route('campaign.update.store', $campaign->id) }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Update</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Update</label>
            <textarea name="content" id="content" rows="6" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Kirim Update</button>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection