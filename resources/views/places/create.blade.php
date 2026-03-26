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