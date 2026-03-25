@extends('layouts.app')

@section('content')
    <div class="container place-detail-wrapper">

        <div class="place-header">
            <div>
                <span class="highlight category-badge">{{ $place->category->name }}</span>
                <h1>{{ $place->name }}</h1>
                <p style="margin-bottom: 0.2rem"><i class="fa-solid fa-location-dot"></i> {{ $place->address }}</p>
                <p><i class="fa-regular fa-clock"></i> <span>Nyitva: 10:00 - 22:00</span></p>
                <p><i class="fa-solid fa-phone"></i> <span>+36 1 234 5678</span></p>
            </div>

            <div>
                <div>
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa-star {{ $i <= $place->reviews->avg('star') ? 'fa-solid' : 'fa-regular' }}"></i>
                    @endfor
                </div>
                <span>{{ $place->reviews->avg('star') }} értékelés</span>
            </div>
        </div>

        <div style="margin-bottom: 3rem;">
            @php
                $validMedia = $place->multimedia->filter(function ($media) {
                    return file_exists(public_path('images/' . $media->image));
                });
                $mediaCount = $validMedia->count();
            @endphp

            @if ($mediaCount === 1)
                <div class="single-image-banner">
                    <img src="/images/{{ $validMedia->first()->image }}" alt="{{ $place->name }}">
                </div>
            @elseif($mediaCount > 1)
                <div class="place-gallery">
                    @foreach ($validMedia->take(3) as $media)
                        <div class="gallery-item {{ $media->is_cover ? 'main-image' : '' }}">
                            <img src="/images/{{ $media->image }}" alt="{{ $place->name }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="single-image-banner no-image">
                    <p><i class="fa-regular fa-image"></i> Nincs elérhető fotó</p>
                </div>
            @endif
        </div>

        <div class="content-grid-layout">
            <div>
                <div style="margin-bottom: 2rem;">
                    <h3>A helyről</h3>
                    <hr class="divider">
                    <p style="margin-bottom: 0.5rem">
                        {{ $place->description ?? 'Ehhez a helyhez még nincs részletes leírás feltöltve.' }}
                    </p>

                    <div class="features-row">
                        @if ($place->outdoor_seating)
                            <span><i class="fa-solid fa-chair"></i> Kültéri asztalok</span>
                        @endif
                        @if ($place->wifi)
                            <span><i class="fa-solid fa-wifi"></i> Wifi</span>
                        @endif
                        @if ($place->pet_friendly)
                            <span><i class="fa-solid fa-dog"></i> Kutyabarát</span>
                        @endif
                        @if ($place->card_payment)
                            <span><i class="fa-solid fa-credit-card"></i> Bankkártyás fizetés</span>
                        @endif
                        @if ($place->photo_spot)
                            <span><i class="fa-solid fa-camera-retro"></i> Fotó pont</span>
                        @endif
                        @if ($place->family_friendly)
                            <span><i class="fa fa-child"></i> Családbarát</span>
                        @endif
                        @if ($place->accessible)
                            <span><i class="fa fa-wheelchair"></i> Akadálymentesített</span>
                        @endif
                        @if ($place->student_discount)
                            <span><i class="fa-solid fa-id-card"></i> Diákkedvezmény</span>
                        @endif
                        @if ($place->free_parking)
                            <span><i class="fa fa-car"></i> Ingyenes parkolás</span>
                        @endif
                        @if ($place->free_entry)
                            <span><i class="fa-ticket-alt"></i> Ingyenes belépés</span>
                        @endif
                    </div>
                </div>

                <div>
                    <div class="section-header">
                        <h3>Vélemények</h3>
                        <!--<button class="btn btn-primary">Írj véleményt</button>-->
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($hasRated === false)
                        <form action="{{ route('reviews.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="place_id" value="{{ $place->id }}">
                            <div class="place-review-card">
                                <div class="review-stars">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5" title="5 csillag"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4" title="4 csillag"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3" title="3 csillag"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2" title="2 csillag"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1" title="1 csillag"><i class="fa-solid fa-star"></i></label>
                                </div>
                                <textarea class="form-textarea" name="comment" id="comment" rows="5" cols="100"
                                    placeholder="Oszd meg a véleményed... (opcionális)" maxlength="1000"></textarea>
                                <button type="submit" class="btn btn-primary" style="margin-top: 0.5rem;">Küldés</button>
                            </div>
                        </form>
                    @endif

                    @forelse($place->reviews as $review)
                        <div class="place-review-card">
                            <div class="review-header">
                                <div class="user-info">
                                    <!--<div class="avatar-circle">{{ substr($review->user->name, 0, 1) }}</div>-->
                                    <!--TODO: Avatar megcsinalasa ha belefer az idobe..-->
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
                        <div>
                            <i class="fa-regular fa-comment-dots"></i>
                            <p class="text-muted">Még nincs vélemény. Legyél te az első!</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <aside>
                <div class="sticky-element">
                    <h3 style="margin-bottom: 0.5rem;">Tervezés</h3>
                    <div style="margin-bottom: 1rem;">
                        <iframe width="100%" height="250" style="border: 1px solid #eee; border-radius: 12px;"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?q={{ urlencode($place->address) }}&t=&z=14&ie=UTF8&iwloc=&output=embed">
                        </iframe>
                    </div>

                    <form action="{{ route('favourites.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="place_id" value="{{ $place->id }}">

                        @php
                            $isFavourite =
                                auth()->check() && auth()->user()->favourites->contains('place_id', $place->id);
                        @endphp

                        <button type="submit" class="btn {{ $isFavourite ? 'btn-danger' : 'btn-primary' }} btn-full">
                            <i class="{{ $isFavourite ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
                            {{ $isFavourite ? 'Eltávolítás a kedvencekből' : 'Mentés a kedvencekhez' }}
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </div>
@endsection
