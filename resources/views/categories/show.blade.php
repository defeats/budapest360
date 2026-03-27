@extends('layouts.app')

@section('content')
    <div class="container place-container">
        <div class="category-header">
            <h1>Budapesti <span class="highlight">{{ $category->name }}</span></h1>
            <button class="btn btn-primary btn-filter" onclick="toggleFilter()">Szűrő</button>
        </div>

        <div class="filter-card" id="filter-card">
            <form action="{{ url()->current() }}" method="GET">
                <div class="filter-group">
                    <span for="wifi"><i class="fa-solid fa-wifi"></i> Wi-Fi</span>
                    <input type="checkbox" name="wifi" id="wifi" {{ request('wifi') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="card_payment">Kártyás fizetés</label>
                    <input type="checkbox" name="card_payment" id="card_payment" {{ request('card_payment') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="pet_friendly">Kutyabarát</label>
                    <input type="checkbox" name="pet_friendly" id="pet_friendly" {{ request('pet_friendly') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="family_friendly">Családbarát</label>
                    <input type="checkbox" name="family_friendly" id="family_friendly" {{ request('family_friendly') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="free_parking">Ingyenes parkolás</label>
                    <input type="checkbox" name="free_parking" id="free_parking" {{ request('free_parking') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="free_entry">Ingyenes belépés</label>
                    <input type="checkbox" name="free_entry" id="free_entry" {{ request('free_entry') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="student_discount">Diákkedvezmény</label>
                    <input type="checkbox" name="student_discount" id="student_discount" {{ request('student_discount') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="outdoor_seating">Kültéri asztalok</label>
                    <input type="checkbox" name="outdoor_seating" id="outdoor_seating" {{ request('outdoor_seating') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="photo_spot">Fotó pont</label>
                    <input type="checkbox" name="photo_spot" id="photo_spot" {{ request('photo_spot') ? 'checked' : '' }}>
                </div>
                <div class="filter-group">
                    <label for="accessible">Akadálymentesített</label>
                    <input type="checkbox" name="accessible" id="accessible" {{ request('accessible') ? 'checked' : '' }}>
                </div>
                <button class="btn btn-outline btn-filter" type="submit">Szűrés</button>
            </form>
        </div>

        <div class="card-grid">
            @forelse($places ?? [] as $place)
                <div class="place-card">
                    <div class="card-image"
                        style="background-image: url('{{ asset('images/' . ($place->multimedias->first()->file_name ?? 'placeholder.jpg')) }}');">
                        <div class="category-tag">{{ $category->name }}</div>
                    </div>
                    <div class="card-content">
                        <h3>{{ $place->name }}</h3>
                        <p><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
                        <div class="card-footer">
                            <span class="rating"><i class="fa-solid fa-star"></i> {{ $place->reviews->avg('star') }}</span>
                            <a href="{{ route('places.show', $place->slug) }}" class="btn-link">Részletek <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty">
                    <div class="empty-icon"><i class="fa-solid fa-map-pin"></i></div>
                    <h2>Hamarosan...</h2>
                    <p>Ebben a kategóriában még nincsenek feltöltött helyek. Gyere vissza később!</p>
                    <a href="/" class="btn btn-link">Vissza a főoldalra</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
