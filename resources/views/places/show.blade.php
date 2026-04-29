@extends('layouts.app')

@section('content')
    <div class="container place-detail-wrapper">

        <div class="place-header">
            <div style="margin-bottom: 1rem;">

                <span class="category-badge">{{ __($place->category->name) }}</span>
                <h1>{{ $place->name }}</h1>
                @if ($place->reviews->count() > 0)
                    <div>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa-star {{ $i <= $place->reviews->avg('star') ? 'fa-solid' : 'fa-regular' }}"></i>
                        @endfor
                    </div>
                @endif
                @can('update', $place)
                <div style="float: right; margin-bottom: 1rem">
                    <a href="{{ route('places.edit', $place) }}" class="btn btn-primary"">
                        <i class="fa-solid fa-pen-to-square"></i> {{ __('Hely szerkesztése') }}
                    </a>
                </div>
                @endcan
            </div>
        </div>

        <div style="margin-bottom: 3rem;">
            @php
                $validMedia = $place->multimedias->filter(function ($media) {
                if (!empty($media->file_path) && file_exists(public_path($media->file_path))) {
                    return true;
                }
                if (!empty($media->file_name) && file_exists(public_path('images/' . $media->file_name))) {
                    return true;
                }});

            $mediaCount = $validMedia->count();
            @endphp

            @if ($mediaCount === 1)
                <div class="single-image-banner">
                    <img src="{{ str_contains($validMedia->first()->file_path, 'images/') ? asset($validMedia->first()->file_path) : asset('images/' . $validMedia->first()->file_name) }}">
                </div>
            @elseif($mediaCount > 1)
                <div class="place-gallery">
                    @foreach ($validMedia->take(3) as $media)
                        <div class="gallery-item">
                            <img src="{{ str_contains($media->file_path, 'images/') ? asset($media->file_path) : asset('images/' . $media->file_name) }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="single-image-banner no-image">
                    <p><i class="fa-regular fa-image"></i> {{ __('Nincs elérhető fotó') }}</p>
                </div>
            @endif
        </div>

        <div class="content-grid-layout">
            <div>
                <div style="margin-bottom: 2rem;">
                    <h3>{{ __('A helyről') }}</h3>
                    <hr class="divider">
                    <p style="margin-bottom: 0.5rem"> {{ $place->description }} </p>

                    <div class="features-row">
                        @if ($place->outdoor_seating)
                            <span><i class="fa-solid fa-chair highlight"></i> {{ __('Kültéri asztalok') }}</span>
                        @endif
                        @if ($place->wifi)
                            <span><i class="fa-solid fa-wifi highlight"></i> {{ __('Wifi') }}</span>
                        @endif
                        @if ($place->pet_friendly)
                            <span><i class="fa-solid fa-dog highlight"></i> {{ __('Kutyabarát') }}</span>
                        @endif
                        @if ($place->card_payment)
                            <span><i class="fa-solid fa-credit-card highlight"></i> {{ __('Bankkártyás fizetés') }}</span>
                        @endif
                        @if ($place->photo_spot)
                            <span><i class="fa-solid fa-camera-retro highlight"></i> {{ __('Fotó pont') }}</span>
                        @endif
                        @if ($place->family_friendly)
                            <span><i class="fa fa-child highlight"></i> {{ __('Családbarát') }}</span>
                        @endif
                        @if ($place->accessible)
                            <span><i class="fa fa-wheelchair highlight"></i> {{ __('Akadálymentesített') }}</span>
                        @endif
                        @if ($place->student_discount)
                            <span><i class="fa-solid fa-id-card highlight"></i> {{ __('Diákkedvezmény') }}</span>
                        @endif
                        @if ($place->free_parking)
                            <span><i class="fa fa-car highlight"></i> {{ __('Ingyenes parkolás') }}</span>
                        @endif
                        @if ($place->free_entry)
                            <span><i class="fa-ticket-alt highlight"></i> {{ __('Ingyenes belépés') }}</span>
                        @endif
                    </div>
                </div>

                <div>
                    <div class="section-header">
                        <h3>{{ __('Vélemények') }}</h3>
                    </div>
                    
                    @auth
                        @if ($hasRated === false)
                            <form action="{{ route('reviews.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="place_id" value="{{ $place->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <div class="place-review-card">
                                    <span style="color: red">{{ $errors->first('star') }}</span>
                                    <div class="review-stars">
                                        <input type="radio" id="star5" name="star" value="5">
                                        <label for="star5" title="{{ __('5 csillag') }}"><i class="fa-solid fa-star"></i></label>
                                        <input type="radio" id="star4" name="star" value="4">
                                        <label for="star4" title="{{ __('4 csillag') }}"><i class="fa-solid fa-star"></i></label>
                                        <input type="radio" id="star3" name="star" value="3">
                                        <label for="star3" title="{{ __('3 csillag') }}"><i class="fa-solid fa-star"></i></label>
                                        <input type="radio" id="star2" name="star" value="2">
                                        <label for="star2" title="{{ __('2 csillag') }}"><i class="fa-solid fa-star"></i></label>
                                        <input type="radio" id="star1" name="star" value="1">
                                        <label for="star1" title="{{ __('1 csillag') }}"><i class="fa-solid fa-star"></i></label>
                                    </div>
                                    <span style="color: red">{{ $errors->first('comment') }}</span>
                                    <textarea class="form-textarea" name="comment" id="comment" rows="5" cols="100"
                                        placeholder="{{ __('Oszd meg a véleményed... (opcionális)') }}" maxlength="1000"></textarea>
                                    <button type="submit" class="btn btn-primary" style="margin-top: 0.5rem;">{{ __('Küldés') }}</button>
                                </div>
                            </form>
                        @endif
                    @endauth

                    @forelse($place->reviews as $review)
                        <div class="place-review-card">
                            <div class="review-header">
                                <div class="user-info">
                                    <div>
                                        <strong>{{ $review->user->name }}</strong><br>
                                        <small class="text-muted">{{ $review->created_at->format('Y. m. d.') }}</small>
                                    </div>
                                </div>
                                <span>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa-{{ $i <= $review->star ? 'solid' : 'regular' }} fa-star"></i>
                                    @endfor
                                </span>
                            </div>
                            <p>{{ $review->comment }}</p>
                        </div>
                    @empty
                        <div class="subtitle">
                            {{ __('Még nincs vélemény. Legyél te az első!') }} <i class="fa-regular fa-comment-dots"></i>
                        </div>
                    @endforelse
                </div>
            </div>

            <aside>
                <div class="sticky-element">
                    <div style="margin-bottom: 2rem;">
                        <h3 style="margin-bottom: 0.5rem;">{{ __('Adatok') }}</h3>
                        <hr class="divider">
                        <p><i class="fa-regular fa-clock"></i> <span>{{ __('Nyitva') }}: 10:00 - 22:00</span></p>
                        <p style="margin-bottom: 0.2rem"><i class="fa-solid fa-location-dot"></i> {{ $place->address }} {{ $place->post_code }}</p>
                        <p><i class="fa-solid fa-phone"></i> <span>{{ $place->phone }}</span></p>
                        <p><i class="fa-solid fa-envelope"></i> <span>{{ $place->email }}</span></p>
                        @if ($place->website)
                            <p><i class="fa-solid fa-globe"></i> <a href="{{ $place->website }}" target="_blank">{{ $place->website }}</a></p>
                        @endif
                    </div>
                    <div>
                        <h3 style="margin-bottom: 1rem;">{{ __('Tervezés') }}</h3>
                        <div style="margin-bottom: 1rem;">
                            <iframe width="100%" height="250" style="border: 1px solid #eee; border-radius: 12px;"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ urlencode($place->address ."+". $place->post_code) }}&t=&z=14&ie=UTF8&iwloc=&output=embed">
                            </iframe>
                        </div>
                        @auth
                        <form action="{{ route('favourites.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="place_id" value="{{ $place->id }}">

                            @php
                                $isFavourite =
                                    auth()->user()->favourites->contains('place_id', $place->id);
                            @endphp

                            <button type="submit" class="btn {{ $isFavourite ? 'btn-danger' : 'btn-primary' }} btn-full">
                                <i class="{{ $isFavourite ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                                {{ $isFavourite ? __('Eltávolítás a kedvencekből') : __('Mentés a kedvencekhez') }}
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection