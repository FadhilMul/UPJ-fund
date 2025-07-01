@extends('layouts.app')

@section('title', 'Buat Campaign')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Buat Campaign Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('campaign.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-3">
            <label for="title" class="form-label">Judul Campaign</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Pilih Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Campaign</label>
            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
        </div>

        {{-- Thumbnail Upload --}}
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Campaign (upload gambar)</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail" accept="image/*" required>
        </div>

        {{-- Target --}}
        <div class="mb-3">
            <label for="target_amount" class="form-label">Target Donasi (Rp)</label>
            <input type="number" class="form-control" id="target_amount" name="target_amount" required value="{{ old('target_amount') }}">
        </div>

        {{-- Tanggal Mulai --}}
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required value="{{ old('start_date') }}">
        </div>

        {{-- Tanggal Berakhir --}}
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Berakhir</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required value="{{ old('end_date') }}">
        </div>

        <button type="submit" class="btn btn-green">Buat Campaign</button>
    </form>
</div>
@endsection