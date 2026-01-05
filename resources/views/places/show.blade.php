@extends('layout.app')

@section('content')
<div class="container place-detail">
    <div class="place-header">
        <div class="title-area">
            <h1>{{ $place->name }}</h1>
            <span class="category-badge">{{ $place->category->name }}</span>
            <p class="address"><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
        </div>
        <div class="rating-summary">
            <span class="big-star"><i class="fa-solid fa-star"></i> {{ $place->rating }}</span>
            <p>{{ $place->reviews->count() }} vélemény</p>
        </div>
    </div>

    <div class="place-gallery">
        @foreach($place->multimedia as $media)
            <div class="gallery-item {{ $media->is_cover ? 'main-image' : '' }}">
                <img src="{{ $media->image }}" alt="{{ $place->name }}">
            </div>
        @endforeach
    </div>

    <div class="place-info-grid">
        <div class="info-content">
            <h3>A helyről</h3>
            <p>{{ $place->description ?? 'Ehhez a helyhez még nincs leírás.' }}</p>
            
            <hr>

            <div class="reviews-section">
                <h3>Vélemények</h3>
                @forelse($place->reviews as $review)
                    <div class="review-card">
                        <div class="review-header">
                            <strong>{{ $review->user->name }}</strong>
                            <span class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $review->star ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                            </span>
                        </div>
                        <p>{{ $review->comment }}</p>
                        <small>{{ $review->created_at->format('Y.m.d') }}</small>
                    </div>
                @empty
                    <p class="text-muted">Még nincs vélemény. Legyél te az első!</p>
                @endforelse
            </div>
        </div>

        <div class="info-sidebar">
            <div class="action-card">
                <button class="btn btn-primary btn-full"><i class="fa-solid fa-heart"></i> Kedvencekhez adom</button>
                <button class="btn btn-primary btn-full mt-1">Útvonaltervezés</button>
            </div>
        </div>
    </div>
</div>
@endsection