@extends('layouts.app')

@section('content')
<div class="container profile-container">
    <div style="text-align: center">
        <h1>{{ __('Szia, ') }} <span class="highlight">{{ Auth::user()->name }}</span>.</h1>
        <p class="subtitle">{{ __('Itt kezelheted a profilodat és a kedvenc helyeidet.') }}</p>
    </div>

    <div class="profile-grid">
        <div>
            <div class="card-header">
                <i class="fa-solid fa-user-gear"></i>
                <h3>{{ __('Személyes adatok') }}</h3>
            </div>
            <div>
                <div class="info-item">
                    <span class="label">{{ __('Felhasználónév') }}</span>
                    <span class="value">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-item">
                    <span class="label">{{ __('E-mail cím') }}</span>
                    <span class="value">{{ Auth::user()->email }}</span>
                </div>
                <div class="info-item">
                    <span class="label">{{ __('Tagság kezdete') }}</span>
                    <span class="value">{{ Auth::user()->created_at->format('Y. m. d.') }}</span>
                </div>
                
                <div class="card-actions">
                    <button class="btn btn-primary btn-full mt-1">{{ __('Adatok módosítása') }}</button>
                </div>
            </div>
        </div>

        @if ($ownedPlaces && $ownedPlaces->count() > 0)
            <div style="min-width: 0; overflow: hidden;"> 
                <div class="card-header">
                    <i class="fa-solid fa-house"></i>
                    <h3>{{ $ownedPlaces->count() === 1 ? __('A saját helyed') : __('A saját helyeid') }}</h3>
                </div>

                <div class="swiper homeSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($ownedPlaces as $place)
                            <div class="swiper-slide">
                                <h2 style="text-align: center; margin-bottom: 1rem;">{{ $place->name }}</h2>
                                <div class="stats-grid">
                                    <a href="{{ route('places.show', $place->slug) }}" class="stat-box">
                                        <span class="stat-label">{{ __("Kattintások") }}</span>
                                        <span class="stat-number">{{ $place->clicks }}</span>
                                    </a>
                                    <a href="{{ route('places.show', $place->slug) }}" class="stat-box">
                                        <span class="stat-label">{{ __("Kedvencekhez adva") }}</span>
                                        <span class="stat-number">{{ $place->favourites->count() }}</span>
                                    </a>
                                    <a href="{{ route('places.show', $place->slug) }}" class="stat-box">
                                        <span class="stat-label">{{ __("Értékelés") }}</span>
                                        <span class="stat-number">{{ $place->getAvgRoundedRating() }}</span>
                                    </a>
                                    <a href="{{ route('places.show', $place->slug) }}" class="stat-box">
                                        <span class="stat-label">{{ __("Vélemények") }}</span>
                                        <span class="stat-number">{{ $place->reviews->count() }}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($ownedPlaces->count() > 1)
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    @endif
                </div>
            </div>
        @endif

        <div>
            <div class="card-header">
                <i class="fa-solid fa-chart-line"></i>
                <h3>{{ __('Aktivitás') }}</h3>
            </div>
            <div class="stats-grid">
                <a href="{{ route('favourites.index') }}" class="stat-box">  
                    @if ($favourites->count() <= 1)
                        <span class="stat-label">{{ __('Kedvenc hely') }}</span>
                    @elseif ($favourites->count() > 1)
                        <span class="stat-label">{{ __('Kedvenc helyek') }}</span>
                    @endif
                    <span class="stat-number">{{ $favourites->count() }}</span>
                </a>

                <div class="stat-box">
                    @if ($reviews->count() <= 1)
                        <span class="stat-label">{{ __('Elküldött értékelés') }}</span>
                    @elseif ($reviews->count() > 1)
                        <span class="stat-label">{{ __('Elküldött értékelések') }}</span>
                    @endif
                    <span class="stat-number">{{ $reviews->count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection