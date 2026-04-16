@extends('layouts.app')

@section('content')
<div class="container profile-container">
    <div style="text-align: center">
        <h1>{{ __('Szia,') }} <span class="highlight">{{ Auth::user()->name }}</span>!</h1>
        <p class="subtitle">{{ __('Itt kezelheted a profilodat és a mentett helyeidet.') }}</p>
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

        <div>
            <div class="card-header">
                <i class="fa-solid fa-chart-line"></i>
                <h3>Aktivitás</h3>
            </div>
            <div class="stats-grid">
                <div class="stat-box">
                    <span class="stat-number">{{ $favourites->count() }}</span>
                    <span class="stat-label">{{ __('Kedvencek') }}</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">{{ $reviews->count() }}</span>
                    <span class="stat-label">{{ __('Értékelések') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection