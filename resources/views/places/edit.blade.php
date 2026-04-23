@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div style="background: red; color: white; padding: 20px;">
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
                <h2>{{ __('Hely szerkesztése') }}</h2>
                <p>{{ __('Itt tudod megváltoztatni a hely adatait') }}</p>
            </div>
            <form method="post" action="{{ route('places.update', $place) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-columns">
                    <div class="input-group">
                        <div>
                            <label for="name">{{ __('Hely neve') }}</label>
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                            <input id="name" type="text" name="name" value="{{ old('name', $place->name) }}" required>
                        </div>

                        <input id="slug" type="hidden" name="slug" value="{{ old('slug', $place->slug) }}">

                        <div>
                            <label for="category_id">{{ __('Kategória') }}</label>
                            <span style="color: red;">{{ $errors->first('category_id') }}</span>
                            <select id="category_id" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ __($category->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="post_code">{{ __('Irányítószám') }}</label>
                            <span style="color: red;">{{ $errors->first('post_code') }}</span>
                            <input type="number" id="post_code" name="post_code" value="{{ old('post_code', $place->post_code) }}" required>
                        </div>

                        <div>
                            <label for="address">{{ __('Cím') }}</label>
                            <span style="color: red;">{{ $errors->first('address') }}</span>
                            <input type="text" id="address" name="address" placeholder="{{ __('Pl. Fő utca 1.') }}"
                                value="{{ old('address', Str::after($place->address, 'Budapest, ')) }}" required>
                        </div>

                        <div>
                            <label for="phone">{{ __('Telefonszám') }}</label>
                            <span style="color: red;">{{ $errors->first('phone') }}</span>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $place->phone) }}">
                        </div>

                        <div>
                            <label for="email">{{ __('Email cím') }}</label>
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                            <input type="email" id="email" name="email" value="{{ old('email', $place->email) }}">
                        </div>

                        <div>
                            <label for="website">{{ __('Weboldal') }}</label>
                            <span style="color: red;">{{ $errors->first('website') }}</span>
                            <input type="url" id="website" name="website" value="{{ old('website', $place->website) }}">
                        </div>

                        <div>
                            <label>{{ __('Galéria') }}</label>
                            <span style="color: red;">{{ $errors->first('place_images') }}</span>
                            
                            <div class="existing-images" style="display: flex; gap: 10px; margin-bottom: 15px; flex-wrap: wrap;">
                                @foreach($place->multimedias as $media)
                                    <div class="image-item" style="position: relative;">
                                        <img src="{{ asset($media->file_path) }}" 
                                            alt="{{ $media->file_name }}" 
                                            style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ccc;">
                                        <div style="font-size: 15px; text-align: center;">{{ $media->file_name }}</div>
                                        @if ($place->multimedias->count() > 1)
                                        <input type="checkbox" name="delete_images[]" style="width: 13px; height: 13px" value="{{ $media->id }}"> {{ __('Törlés') }}
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <input type="file" name="place_images[]" accept="image/*" multiple> 
                            <div id="preview-container" style="margin-top: 10px;"></div>
                        </div>
                    </div>

                    <div class="input-group">
                        <div>
                            <label for="description">{{ __('Leírás') }}</label>
                            <span style="color: red;">{{ $errors->first('description') }}</span>
                            <textarea class="form-textarea" id="description" name="description" rows="4">{{ old('description', $place->description) }}</textarea>
                        </div>

                        <div class="filter-group">
                            <div>
                                <label for="wifi">{{ __('Wifi') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="wifi" id="wifi" value="1" 
                                    {{ old('wifi', $place->wifi) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="card_payment">{{ __('Bankkártyás fizetés') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="card_payment" id="card_payment" value="1"
                                        {{ old('card_payment', $place->card_payment) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="pet_friendly">{{ __('Kutyabarát') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="pet_friendly" id="pet_friendly" value="1"
                                        {{ old('pet_friendly', $place->pet_friendly) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="family_friendly">{{ __('Családbarát') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="family_friendly" id="family_friendly" value="1"
                                        {{ old('family_friendly', $place->family_friendly) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="free_parking">{{ __('Ingyenes parkolás') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="free_parking" id="free_parking" value="1"
                                        {{ old('free_parking', $place->free_parking) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="free_entry">{{ __('Ingyenes belépés') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="free_entry" id="free_entry" value="1"
                                         {{ old('free_entry', $place->free_entry) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="student_discount">{{ __('Diákkedvezmény') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="student_discount" id="student_discount" value="1"
                                        {{ old('student_discount', $place->student_discount) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="outdoor_seating">{{ __('Kültéri asztalok') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="outdoor_seating" id="outdoor_seating" value="1"
                                        {{ old('outdoor_seating', $place->outdoor_seating) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="photo_spot">{{ __('Fotó pont') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="photo_spot" id="photo_spot" value="1"
                                        {{ old('photo_spot', $place->photo_spot) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>

                            <div>
                                <label for="accessible">{{ __('Akadálymentesített') }}</label>
                                <label class="toggle-switch" tabindex="0">
                                    <input type="checkbox" name="accessible" id="accessible" value="1"
                                        {{ old('accessible', $place->accessible) ? 'checked' : '' }} class="toggle-switch__input" />
                                    <span class="toggle-switch__slider"></span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Mentés') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection