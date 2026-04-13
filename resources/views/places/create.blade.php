@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <section class="new-place-form-container">
        <div class="new-place-form">
            <div class="form-header">
                <h2>{{ __('Hely hozzáadása') }}</h2>
                <p>{{ __('Add meg a hely adatait') }}</p>
            </div>
            <form method="POST" action="{{ route('places.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-columns">
                    <div class="input-group">
                        <div>
                            <label for="name">{{ __('Hely neve') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                        </div>

                        <input id="slug" type="hidden" name="slug" value="{{ old('slug') }}">

                        <div>
                            <label for="category_id">{{ __('Kategória') }}</label>
                            <select id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="post_code">{{ __('Irányítószám') }}</label>
                            <input type="number" id="post_code" name="post_code" value="{{ old('post_code') }}" required>
                        </div>

                        <div>
                            <label for="address">{{ __('Cím') }}</label>
                            <input type="text" id="address" name="address" placeholder="Pl. Fő utca 1."
                                value="{{ old('address') }}" required>
                        </div>

                        <div>
                            <label for="phone">{{ __('Telefonszám') }}</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div>
                            <label for="email">{{ __('Email cím') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div>
                            <label for="website">{{ __('Weboldal') }}</label>
                            <input type="url" id="website" name="website" value="{{ old('website') }}">
                        </div>

                        <div>
                            <label for="description">{{ __('Leírás') }}</label>
                            <textarea class="form-textarea" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <label>Galéria</label>
                            <input type="file" name="place_images[]" accept="image/*" multiple>
                            <div id="preview-container" style="margin-top: 10px;"></div>
                        </div>

                        <script>
                            document.querySelector('input[name="place_images[]"]').addEventListener('change', function(event) {
                                const container = document.getElementById('preview-container');
                                container.innerHTML = '';

                                Array.from(event.target.files).forEach(file => {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const img = document.createElement('img');
                                        img.src = e.target.result;
                                        img.style.width = '100px';
                                        img.style.margin = '5px';
                                        img.style.borderRadius = '8px';
                                        container.appendChild(img);
                                    }
                                    reader.readAsDataURL(file);
                                });
                            });
                        </script>
                    </div>
                    <div class="input-group">
                        <!-- <div>
                                                            <label for="opening_hours">{{ __('Nyitvatartási idő') }}</label>
                                                            <input type="text" id="opening_hours" name="opening_hours" placeholder="Pl. H-P: 9:00-18:00" value="{{ old('opening_hours') }}">
                                                        </div> -->

                        <div>
                            <label for="price_range">{{ __('Ártartomány') }}</label>
                            <select id="price_range" name="price_range">
                                <option value="" {{ old('price_range') == '' ? 'selected' : '' }}>
                                    {{ __('Nem szeretném megadni') }}</option>
                                <option value="2000 - 4000 Ft"
                                    {{ old('price_range') == '2000 - 4000 Ft' ? 'selected' : '' }}>
                                    2000 - 4000 Ft
                                </option>
                                <option value="4000 - 6000 Ft"
                                    {{ old('price_range') == '4000 - 6000 Ft' ? 'selected' : '' }}>
                                    4000 - 6000 Ft
                                </option>
                                <option value="6000 - 8000 Ft"
                                    {{ old('price_range') == '6000 - 8000 Ft' ? 'selected' : '' }}>
                                    6000 - 8000 Ft
                                </option>
                                <option value="8000 - 10000 Ft"
                                    {{ old('price_range') == '8000 - 10000 Ft' ? 'selected' : '' }}>8000 - 10000 Ft
                                </option>
                                <option value="10000 Ft felett"
                                    {{ old('price_range') == '10000 Ft felett' ? 'selected' : '' }}>10000 Ft felett
                                </option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <div>
                                <label for="wifi">Wi-Fi</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="wifi" id="wifi"
                                        {{ request('wifi') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="card_payment">Kártyás fizetés</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="card_payment" id="card_payment"
                                        {{ request('card_payment') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="pet_friendly">Kutyabarát</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="pet_friendly" id="pet_friendly"
                                        {{ request('pet_friendly') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="family_friendly">Családbarát</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="family_friendly" id="family_friendly"
                                        {{ request('family_friendly') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="free_parking">Ingyenes parkolás</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="free_parking" id="free_parking"
                                        {{ request('free_parking') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="free_entry">Ingyenes belépés</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="free_entry" id="free_entry"
                                        {{ request('free_entry') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="student_discount">Diákkedvezmény</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="student_discount" id="student_discount"
                                        {{ request('student_discount') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="outdoor_seating">Kültéri asztalok</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="outdoor_seating" id="outdoor_seating"
                                        {{ request('outdoor_seating') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="photo_spot">Fotó pont</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="photo_spot" id="photo_spot"
                                        {{ request('photo_spot') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="accessible">Akadálymentesített</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="accessible" id="accessible"
                                        {{ request('accessible') ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Hely hozzáadása') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
