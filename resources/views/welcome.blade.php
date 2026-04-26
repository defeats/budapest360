@extends('layouts.app')

@section('content')
    <div class="swiper welcome-slider popular-places-slider">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1>Budapest<span class="highlight">360</span></h1>
                <p class="subtitle">{{ __('Minden, ami Budapest. Egy helyen.') }}</p>
            </div>
        </div>
        <div class="swiper-wrapper">
            @foreach ($popularPlaces as $place)
                <div class="swiper-slide">
                    <div class="welcome-place-card">
                        <div class="image-wrapper">
                            <img src="{{ str_contains($place->multimedias->first()->file_path, 'images/') ? asset($place->multimedias->first()->file_path) : asset('images/' . $place->multimedias->first()->file_name) }}"
                                alt="{{ $place->name }}" class="place-image">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
