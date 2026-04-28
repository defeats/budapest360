@extends('layouts.app')

@section('content')
<div class="landing-hero-section">
    <div class="swiper welcome-slider popular-places-slider background-slider">
        <div class="swiper-wrapper">
            @foreach ($popularPlaces as $place)
                <div class="swiper-slide">
                    <div class="image-wrapper">
                        <img src="{{ str_contains($place->multimedias->first()->file_path, 'images/') ? asset($place->multimedias->first()->file_path) : asset('images/' . $place->multimedias->first()->file_name) }}"
                             alt="{{ $place->name }}" class="place-image">
                        <div class="dark-overlay"></div> 
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="hero-overlay">
        <div class="hero-content">
            <h1 class="animate-fade-in">Budapest<span class="highlight">360</span></h1>
            <p class="subtitle animate-slide-up">{{ __('Minden, ami Budapest. Egy helyen.') }}</p>
            
            <div class="hero-actions animate-slide-up-delayed">
                <div class="search-glass-container">
                    <form action="#" method="GET" class="hero-search-form">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <input type="text" name="search" placeholder="{{ __('Keress egy helyet, kerületet vagy kategóriát...') }}" class="hero-search-input">
                        <button type="submit" class="btn-primary search-btn">{{ __('Keresés') }}</button>
                    </form>
                </div>

                <div class="hero-quick-links">
                    <a href="{{ route('places.index') }}" class="btn-glass"><i class="fa-solid fa-map-location-dot"></i> {{ __('Felfedezés') }}</a>
                    <a href="#top-places" class="btn-glass"><i class="fa-solid fa-fire"></i> {{ __('Top Helyek') }}</a>
                </div>
            </div>
        </div>

        <div class="scroll-indicator animate-bounce">
            <span class="scroll-text">{{ __('Görgess lefelé') }}</span>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </div>
</div>

<section id="top-places" class="landing-section featured-places-section bg-light">
    <div class="container">
        <div class="section-header d-flex justify-content-between align-items-end">
            <div>
                <h2 class="section-title">{{ __('Kiemelt helyek Budapesten') }}</h2>
                <p class="section-subtitle">{{ __('Ezeket a helyeket imádják a felhasználóink') }}</p>
            </div>
            <a href="{{ route('places.index') }}" class="btn-outline">{{ __('Összes megtekintése') }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="card-grid">
            @forelse($popularPlaces as $place)
                <div class="place-card">
                    <div class="card-image" style="background-image: url('{{ $place->getThumbnailUrl() }}');">
                    </div>

                    <div class="card-content">
                        <h3>{{ $place->name }}</h3>
                        <p><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
                        <div class="card-footer">
                            @if ($place->reviews->count() > 0)
                            <span class="rating"><i class="fa-solid fa-star"></i>
                                {{ $place->getAvgRoundedRating() }}</span>
                            @endif
                            @if ($place->reviews->count() === 0)
                            <span class="rating" style="color: #a7a7a7;"><i class="fa-regular fa-star"></i> {{ __('Nincs értékelés') }}</span>
                            @endif
                            <a href="{{ route('places.show', $place->slug) }}" class="btn-link">{{ __('Részletek') }} 
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>{{ __('Még nincsenek kiemelt helyek.') }}</p>
            @endforelse
        </div> 
    </div> 
</section>

<section class="landing-section cta-section">
    <div class="cta-container">
        <div class="cta-content">
            <h2>{{ __('Vállalkozásod van Budapesten?') }}</h2>
            <p>{{ __('Csatlakozz a Budapest360 hálózatához, és érj el több ezer potenciális vendéget naponta!') }}</p>
            <p>{{ __('Keress meg minket az admin@bp360.hu email címen!') }}</p>
            <div class="cta-buttons">
                <a href="#" class="btn btn-primary btn-large">{{ __('Hely regisztrálása') }}</a>
                <a href="" class="btn btn-outline-light btn-large">{{ __('Bővebb információ') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection