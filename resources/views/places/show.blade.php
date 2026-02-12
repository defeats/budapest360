@extends('layouts.app')

@section('content')
<div class="container place-detail-wrapper">
    
    <div class="place-header">
        <div class="header-left">
            <div class="badge-row">
                <span class="category-badge">{{ $place->category->name }}</span>
                @if($place->rating >= 4.5)
                    <span class="top-rated-badge"><i class="fa-solid fa-medal"></i> Kiváló választás</span>
                @endif
            </div>
            <h1>{{ $place->name }}</h1>
            <p class="address"><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
        </div>
        
        <div class="header-right">
            <div class="rating-box">
                <div class="rating-number">{{ $place->rating }}</div>
                <div class="rating-meta">
                    <div class="stars">
                        @for($i=1; $i<=5; $i++)
                            <i class="fa-{{ $i <= round($place->rating) ? 'solid' : 'regular' }} fa-star"></i>
                        @endfor
                    </div>
                    <span>{{ $place->reviews->count() }} értékelés</span>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-container">
        @php 
            $validMedia = $place->multimedia->filter(function($media) {
                return file_exists(public_path('images/' . $media->image));
            });
            $mediaCount = $validMedia->count();
        @endphp

        @if($mediaCount === 1)
            <div class="single-image-banner">
                <img src="/images/{{ $validMedia->first()->image }}" alt="{{ $place->name }}">
            </div>
        @elseif($mediaCount > 1)
            <div class="place-gallery">
                @foreach($validMedia->take(3) as $media) 
                    <div class="gallery-item {{ $media->is_cover ? 'main-image' : '' }}">
                        <img src="/images/{{ $media->image }}" alt="{{ $place->name }}">
                    </div>
                @endforeach
            </div>
        @else
            <div class="single-image-banner no-image">
                <p><i class="fa-regular fa-image"></i> Nincs elérhető fotó</p>
            </div>
        @endif
    </div>

    <div class="content-grid-layout">
        
        <div class="main-content">
            
            <div class="info-card description-card">
                <h3>A helyről</h3>
                <hr class="divider">
                <p class="lead-text" style="margin-bottom: 0.75rem">{{ $place->description ?? 'Ehhez a helyhez még nincs részletes leírás feltöltve.' }}</p>
                
                <div class="features-row">
                    <span><i class="fa-solid fa-wifi"></i> Wifi</span>
                    <span><i class="fa-solid fa-dog"></i> Kutyabarát</span>
                    <span><i class="fa-solid fa-credit-card"></i> Bankkártya</span>
                </div>
            </div>

            <div class="reviews-section">
                <div class="section-header">
                    <h3>Vélemények</h3>
                    <button class="btn btn-primary btn-outline">Írj véleményt</button>
                </div>

                @forelse($place->reviews as $review)
                    <div class="place-review-card">
                        <div class="review-header">
                            <div class="user-info">
                                <div class="avatar-circle">{{ substr($review->user->name, 0, 1) }}</div>
                                <div>
                                    <strong>{{ $review->user->name }}</strong>
                                    <small class="text-muted">{{ $review->created_at->format('Y. m. d.') }}</small>
                                </div>
                            </div>
                            <span class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-{{ $i <= $review->star ? 'solid' : 'regular' }} fa-star"></i>
                                @endfor
                            </span>
                        </div>
                        <p class="review-text">"{{ $review->comment }}"</p>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fa-regular fa-comment-dots"></i>
                        <p class="text-muted">Még nincs vélemény. Legyél te az első!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <aside class="sidebar">
            <div class="action-card sticky-element">
                <h3>Tervezés</h3>
                <div class="map-container" style="margin-bottom: 1rem;">
                    <iframe 
                        width="100%" 
                        height="250" 
                        style="border: 1px solid #eee; border-radius: 12px;"
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q={{ urlencode($place->address) }}&t=&z=14&ie=UTF8&iwloc=&output=embed">
                    </iframe>
                </div>
                
                <button class="btn btn-primary btn-full"><i class="fa-regular fa-heart"></i> Mentés kedvencnek</button>
                
                <div class="quick-info">
                    <div class="info-row"><i class="fa-regular fa-clock"></i> <span>Nyitva: 10:00 - 22:00</span></div>
                    <div class="info-row"><i class="fa-solid fa-phone"></i> <span>+36 1 234 5678</span></div>
                </div>
            </div>
        </aside>

    </div>
</div>
@endsection