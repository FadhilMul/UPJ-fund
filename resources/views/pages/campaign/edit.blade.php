@extends('layouts.app')

@section('title', 'Edit Campaign')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Edit Campaign</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaign.update', $campaign->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Campaign</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $campaign->title) }}" required>
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $campaign->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description', $campaign->description) }}</textarea>
        </div>

        {{-- Thumbnail --}}
        <div class="mb-3">
            <label class="form-label">Thumbnail Saat Ini</label><br>
            <img src="{{ $campaign->thumbnail ? asset('storage/thumbnails/' . $campaign->thumbnail) : 'https://placehold.co/320x200/C4C4C4/FFF?text=No+Image' }}" 
                 class="img-thumbnail mb-2" style="max-height: 200px;">
            <input type="file" name="thumbnail" class="form-control mt-2" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti thumbnail</small>
        </div>

        {{-- Target Donasi --}}
        <div class="mb-3">
            <label for="target_amount" class="form-label">Target Donasi (Rp)</label>
            <input type="number" class="form-control" id="target_amount" name="target_amount"
                value="{{ old('target_amount', $campaign->target_amount) }}" required>
        </div>

        {{-- Tanggal Mulai --}}
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date"
                value="{{ old('start_date', $campaign->start_date->format('Y-m-d')) }}" required>
        </div>

        {{-- Tanggal Berakhir --}}
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" id="end_date" name="end_date"
                value="{{ old('end_date', $campaign->end_date->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-green">Simpan Perubahan</button>
    </form>
</div>
@endsection