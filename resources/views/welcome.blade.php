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
                        <div class="dark-overlay"></div> </div>
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
                    <a href="#" class="btn-glass"><i class="fa-solid fa-map-location-dot"></i> {{ __('Felfedezés') }}</a>
                    <a href="#" class="btn-glass"><i class="fa-solid fa-fire"></i> {{ __('Top Helyek') }}</a>
                </div>
            </div>
        </div>

        <div class="scroll-indicator animate-bounce">
            <span class="scroll-text">{{ __('Görgess lefelé') }}</span>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </div>
</div>

@endsection