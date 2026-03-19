@extends('layouts.app')
<!--TODO -->
@section('content')
    <div class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>{{ __('Regisztráció') }}</h2>
                <p>{{ __('Csatlakozz a Budapest360 közösséghez!') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Felhasználónév') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail cím') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Jelszó') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="input-group">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Jelszó megerősítése') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Regisztráció') }}
                </button>
                <a class="btn btn-link" href="{{ route('login') }}">
                    {{ __('Már van fiókod?') }}
                </a>
            </form>
        </div>
    </div>
@endsection