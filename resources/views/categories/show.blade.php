@extends('layouts.app')

@section('content')
    <div class="container place-container">
        <div class="category-header">
            <h1>{{ __('Budapesti') }} <span class="highlight">{{ __($category->name) }}</span></h1>
            <button class="btn btn-primary btn-filter" onclick="toggleFilter()">{{ __('Szűrő') }}</button>
        </div>

        <form action="{{ url()->current() }}" method="GET">
            <div class="filter-card" id="filter-card">
                <div class="filter-group">
                    <label for="wifi">{{ __('Wifi') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="wifi" id="wifi" {{ request('wifi') ? 'checked' : '' }}
                            class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="card_payment">{{ __('Bankkártyás fizetés') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="card_payment" id="card_payment"
                            {{ request('card_payment') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="pet_friendly">{{ __('Kutyabarát') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="pet_friendly" id="pet_friendly"
                            {{ request('pet_friendly') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="family_friendly">{{ __('Családbarát') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="family_friendly" id="family_friendly"
                            {{ request('family_friendly') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="free_parking">{{ __('Ingyenes parkolás') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="free_parking" id="free_parking"
                            {{ request('free_parking') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="free_entry">{{ __('Ingyenes belépés') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="free_entry" id="free_entry"
                            {{ request('free_entry') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="student_discount">{{ __('Diákkedvezmény') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="student_discount" id="student_discount"
                            {{ request('student_discount') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="outdoor_seating">{{ __('Kültéri asztalok') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="outdoor_seating" id="outdoor_seating"
                            {{ request('outdoor_seating') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="photo_spot">{{ __('Fotó pont') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="photo_spot" id="photo_spot"
                            {{ request('photo_spot') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <label for="accessible">{{ __('Akadálymentesített') }}</label>
                    <label class="toggle-switch" tabindex="0">
                        <input type="checkbox" name="accessible" id="accessible"
                            {{ request('accessible') ? 'checked' : '' }} class="toggle-switch__input" />
                        <span class="toggle-switch__slider"></span>
                    </label>
                </div>

                <div class="filter-group">
                    <button class="btn btn-outline btn-filter" type="submit">{{ __('Szűrés') }}</button>
                </div>
            </div>
        </form>


        <div class="card-grid">
            @forelse($places ?? [] as $place)
                <div class="place-card">
                    <div class="card-image" style="background-image: url('{{ $place->getThumbnailUrl() }}');">
                    </div>

                    <div class="card-content">
                        <h3>{{ $place->name }}</h3>
                        <p><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
                        <div class="card-footer">
                            @if ($place->reviews->count() > 0)
                            <span class="rating"><i class="fa-solid fa-star"></i>
                                {{ $place->getAvgRoundedRating() }}</span>
                            @endif
                            @if ($place->reviews->count() === 0)
                            <span class="rating" style="color: #a7a7a7;"><i class="fa-regular fa-star"></i> {{ __('Nincs értékelés') }}</span>
                            @endif
                            <a href="{{ route('places.show', $place->slug) }}" class="btn-link">{{ __('Részletek') }} 
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="empty">
                    <div class="empty-icon"><i class="fa-solid fa-map-pin"></i></div>
                    <h2>{{ __('Hamarosan...') }}</h2>
                    <p>{{ __('Ebben a kategóriában még nincsenek feltöltött helyek. Gyere vissza később!') }}</p>
                    <a href="/" class="btn btn-link">{{ __('Vissza a főoldalra') }}</a>
                </div>
            @endforelse

        </div>
    </div>
@endsection