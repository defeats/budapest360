@extends('layouts.app')

@section('content')
    <section class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>Bejelentkezés</h2>
                <p>Üdvözlünk újra!</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail cím</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Jelszó</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-options">
                            <label class="remember-me" for="remember">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                Emlékezz rám
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Bejelentkezés
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Elfelejtetted a jelszavad?
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
