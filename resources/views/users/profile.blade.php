@extends('layout.app')

@section('content')
<div class="container profile-container">
    <div class="profile-header">
        <h1>Szia, <span class="highlight">{{ Auth::user()->name }}</span>!</h1>
        <p class="subtitle">Itt kezelheted a profilodat és a mentett helyeidet.</p>
    </div>

    <div class="profile-grid">
        <div class="profile-card info-card">
            <div class="card-header">
                <i class="fa-solid fa-user-gear"></i>
                <h3>Személyes adatok</h3>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <span class="label">Felhasználónév</span>
                    <span class="value">{{ Auth::user()->name }}</span>
                </div>
                <div class="info-item">
                    <span class="label">E-mail cím</span>
                    <span class="value">{{ Auth::user()->email }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Tagság kezdete</span>
                    <span class="value">{{ Auth::user()->created_at->format('Y. m. d.') }}</span>
                </div>
                
                <div class="card-actions">
                    <button class="btn btn-primary btn-full mt-1">Adatok módosítása</button>
                </div>
            </div>
        </div>

        <div class="profile-card stats-card">
            <div class="card-header">
                <i class="fa-solid fa-chart-line"></i>
                <h3>Aktivitás</h3>
            </div>
            <div class="stats-grid">
                <div class="stat-box">
                    <span class="stat-number">0</span>
                    <span class="stat-label">Kedvencek</span>
                </div>
                <div class="stat-box">
                    <span class="stat-number">0</span>
                    <span class="stat-label">Értékelések</span>
                </div>
            </div>
            <div class="card-body">
                <p class="text-muted">Még nincsenek mentett helyeid. Böngéssz a látnivalók között!</p>
                <a href="/sights" class="btn btn-primary btn-full mt-1">Felfedezés</a>
            </div>
        </div>
    </div>
</div>
@endsection