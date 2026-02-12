@extends('layouts.app') @section('content')
    <section class="hero-section">
        <div class="hero-content">
            <h1>Budapest<span class="highlight">360</span></h1>
            <p class="subtitle">Minden, ami Budapest. Egy helyen.</p>
            <form action="/search" method="GET" class="hero-search-form">
                <input type="text" name="q" placeholder="Keress helyet, éttermet, élményt..." class="search-input">
                <button type="submit" class="search-btn">Keresés</button>
            </form>
        </div>
    </section>
@endsection