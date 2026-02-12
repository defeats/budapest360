@extends('layouts.app')

@section('content')
<div class="container place-container">
    <div class="page-header">
        <h1>Budapest, egy helyen.</h1>
    </div>

    <div class="card-grid">
        @forelse($places ?? [] as $place)
            <div class="place-card">
                <div class="card-image" style="background-image: url('{{ asset('images/' . ($place->multimedia->first()->image ?? 'placeholder.jpg')) }}');">
                </div>
                <div class="card-content">
                    <h3>{{ $place->name }}</h3>
                    <p><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
                    <div class="card-footer">
                        <span class="rating"><i class="fa-solid fa-star"></i> {{ $place->rating }}</span>
                        <a href="{{ route('places.show', $place->slug) }}" class="btn-link">Részletek <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-favorites">
                <div class="empty-icon"><i class="fa-solid fa-map-pin"></i></div>
                <h2>Hamarosan...</h2>
                <p>Még nincsenek feltöltött helyek. Gyere vissza később!</p>
                <a href="/" class="btn btn-primary">Vissza a főoldalra</a>
            </div>
        @endforelse
    </div>
</div>
@endsection