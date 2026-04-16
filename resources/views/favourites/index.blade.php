@extends('layouts.app')

@section('content')
<div class="container place-container">
    <div class="page-header">
        <h1>{!! __('Mentett <span class="highlight">helyeid</span>') !!}</h1>
        <p class="subtitle">{{ __('Itt találod az összes helyet, amit későbbre elmentettél magadnak.') }}</p>
    </div>

    <div class="card-grid">        
        @forelse($favourites ?? [] as $favourite)
            <div class="place-card">
                <div class="card-image" style="background-image: url('{{ asset('images/' . ($favourite->place->multimedia->first()->image ?? 'placeholder.jpg')) }}');">
                        
                </div>
                <div class="card-content">
                    <h3>{{ $favourite->place->name ?? 'N/A' }}</h3>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $favourite->place->address ?? '' }}</p>
                    <div class="card-footer">
                        <span class="rating"><i class="fa-solid fa-star"></i> {{ $favourite->place->reviews->avg('star') ?? 0 }}</span>
                        <a href="{{ route('places.show', $favourite->place->slug) }}" class="btn-link">{{ __('Részletek') }} <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-favorites">
                <div class="empty-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <h2>{{ __('Még nincsenek kedvenceid') }}</h2>
                <p>{{ __('Böngéssz a budapesti helyszínek között, és kattints a szív ikonra, hogy elmentsd őket!') }}</p>
                <a href="/places" class="btn btn-primary">{{ __('Felfedezés indítása') }}</a>
            </div>
        @endforelse
    </div>
</div>
@endsection