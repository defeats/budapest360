@extends('layout.app')

@section('content')
<div class="container place-container">
    <div class="page-header">
        <h1>Mentett <span class="highlight">helyeid</span></h1>
        <p class="subtitle">Itt találod az összes helyet, amit későbbre elmentettél magadnak.</p>
    </div>

    <div class="card-grid">
        {{-- dinamikus forelse ciklus --}}
        
        @forelse($favorites ?? [] as $favorite)     
        @empty
            <div class="empty-favorites">
                <div class="empty-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <h2>Még nincsenek kedvenceid</h2>
                <p>Böngéssz a budapesti helyszínek között, és kattints a szív ikonra, hogy elmentsd őket!</p>
                <a href="/sights" class="btn btn-primary">Felfedezés indítása</a>
            </div>
        @endforelse

        {{-- pelda kartya --}}
        <div class="place-card">
            <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=500');">
                <div class="category-tag">Étterem</div>
                <button class="remove-favorite" title="Eltávolítás">
                    <i class="fa-solid fa-heart"></i>
                </button>
            </div>
            <div class="card-content">
                <h3>Gundel Étterem</h3>
                <p><i class="fa-solid fa-location-dot"></i> 1146 Budapest, Gundel Károly út 4.</p>
                <div class="card-footer">
                    <span class="rating"><i class="fa-solid fa-star"></i> 4.8</span>
                    <a href="/place/1" class="btn-link">Részletek <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="favorite-card">
            <div class="card-image" style="background-image: url('https://images.unsplash.com/photo-1565426122554-41528148972e?q=80&w=500');">
                <div class="category-tag">Látnivaló</div>
                <button class="remove-favorite" title="Eltávolítás">
                    <i class="fa-solid fa-heart"></i>
                </button>
            </div>
            <div class="card-content">
                <h3>Halászbástya</h3>
                <p><i class="fa-solid fa-location-dot"></i> 1014 Budapest, Szentháromság tér</p>
                <div class="card-footer">
                    <span class="rating"><i class="fa-solid fa-star"></i> 4.9</span>
                    <a href="/place/2" class="btn-link">Részletek <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection