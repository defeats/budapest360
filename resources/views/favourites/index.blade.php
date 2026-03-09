@extends('layouts.app')

@section('content')
<div class="container place-container">
    <div class="page-header">
        <h1>Mentett <span class="highlight">helyeid</span></h1>
        <p class="subtitle">Itt találod az összes helyet, amit későbbre elmentettél magadnak.</p>
    </div>

    <div class="card-grid">        
        @forelse($favorites ?? [] as $favorite)     
        @empty
            <div class="empty-favorites">
                <div class="empty-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <h2>Még nincsenek kedvenceid</h2>
                <p>Böngéssz a budapesti helyszínek között, és kattints a szív ikonra, hogy elmentsd őket!</p>
                <a href="/places" class="btn btn-primary">Felfedezés indítása</a>
            </div>
        @endforelse
    </div>
</div>
@endsection