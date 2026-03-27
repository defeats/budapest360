@extends('layouts.app')

@section('content')
    <section class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>{{ __('Hely hozzáadása') }}</h2>
                <p>{{ __('Add meg a hely adatait') }}</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('places.store') }}">
                        @csrf
                        <div class="input-group">
                            <label for="name">{{ __('Hely neve') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                        </div>

                        <input id="slug" type="hidden" name="slug" value="{{ old('slug') }}">

                        <script>
                            const nameInput = document.getElementById('name').value;
                            const slugInput = document.getElementById('slug');
                            slugInput.value = nameInput.toLowerCase().replace(/\s+/g, '-');
                        </script>

                        <div class="input-group">
                            <label for="category_id">{{ __('Kategória') }}</label>
                            <select id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="post_code">{{ __('Irányítószám') }}</label>
                            <input type="number" id="post_code" name="post_code" value="{{ old('post_code') }}" required>
                        </div>

                        <div class="input-group">
                            <label for="address">{{ __('Cím') }}</label>
                            <input type="text" id="address" name="address" placeholder="Pl. Fő utca 1." value="{{ old('address') }}" required>
                        </div>

                        <div class="input-group">
                            <label for="phone">{{ __('Telefonszám') }}</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="input-group">
                            <label for="email">{{ __('Email cím') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="input-group">
                            <label for="website">{{ __('Weboldal') }}</label>
                            <input type="url" id="website" name="website" value="{{ old('website') }}">
                        </div>

                        <div class="input-group">
                            <label for="description">{{ __('Leírás') }}</label>
                            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="opening_hours">{{ __('Nyitvatartási idő') }}</label>
                            <input type="text" id="opening_hours" name="opening_hours" placeholder="Pl. H-P: 9:00-18:00" value="{{ old('opening_hours') }}">
                        </div>

                        <div class="input-group">
                            <label for="price_range">{{ __('Ártartomány') }}</label>
                            <select id="price_range" name="price_range">
                                <option value="" {{ old('price_range') == '' ? 'selected' : '' }}>{{ __('Válassz') }}</option>
                                <option value="$" {{ old('price_range') == '$' ? 'selected' : '' }}>$</option>
                                <option value="$$" {{ old('price_range') == '$$' ? 'selected' : '' }}>$$</option>
                                <option value="$$$" {{ old('price_range') == '$$$' ? 'selected' : '' }}>$$$</option>
                                <option value="$$$$" {{ old('price_range') == '$$$$' ? 'selected' : '' }}>$$$$</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="outdoor_seating" name="outdoor_seating">
                            <label for="outdoor_seating"><i class="fa-solid fa-chair"></i> {{ __('Kültéri ülőhely') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="wifi" name="wifi">
                            <label for="wifi"><i class="fa-solid fa-wifi"></i> {{ __('Wi-fi') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="pet_friendly" name="pet_friendly">
                            <label for="pet_friendly"><i class="fa-solid fa-dog"></i> {{ __('Kutyabarát') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="card_payment" name="card_payment">
                            <label for="card_payment"><i class="fa-solid fa-credit-card"></i> {{ __('Bankkártyás fizetés') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="photo_spot" name="photo_spot">
                            <label for="photo_spot"><i class="fa-solid fa-camera-retro"></i> {{ __('Fotó pont') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="family_friendly" name="family_friendly">
                            <label for="family_friendly"><i class="fa fa-child"></i> {{ __('Családbarát') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="accessible" name="accessible">
                            <label for="accessible"><i class="fa fa-wheelchair"></i> {{ __('Akadálymentesített') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="student_discount" name="student_discount">
                            <label for="student_discount"><i class="fa-solid fa-id-card"></i> {{ __('Diákkedvezmény') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="free_parking" name="free_parking">
                            <label for="free_parking"><i class="fa fa-car"></i> {{ __('Ingyenes parkolás') }}</label>
                        </div>

                        <div class="input-group">
                            <input type="checkbox" id="free_entry" name="free_entry">
                            <label for="free_entry"><i class="fa-ticket-alt"></i> {{ __('Ingyenes belépés') }}</label>
                        </div>

                        <label class="remember-me" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Emlékezz rám') }}
                        </label><br>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Hely hozzáadása') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection