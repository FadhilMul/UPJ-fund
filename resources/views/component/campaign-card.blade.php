<div class="card h-100">
    <img src="{{ $campaign->image_url ?? 'https://via.placeholder.com/400x200' }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title fw-bold">{{ $campaign->title }}</h5>
        <small class="text-muted">{{ $campaign->created_at->format('F j, Y') }}</small>
        <p class="card-text mt-2">{{ \Illuminate\Support\Str::limit($campaign->description, 80) }}</p>
        <p class="small text-muted">Terkumpul: <strong>Rp{{ number_format($campaign->collected_amount, 0, ',', '.') }}</strong></p>
        <a href="{{ route('campaign.show', $campaign->id) }}" class="btn btn-green w-100">Donate now</a>
    </div>
</div>