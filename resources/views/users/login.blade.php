@extends('layout.app')

@section('content')
<section class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Bejelentkezés</h2>
            <p>Üdvözlünk újra!</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="input-group">
                <label for="email">E-mail cím</label>
                <input type="email" name="email" id="email" placeholder="pelda@email.hu" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" {{ old('remember') == 'on' ? 'checked' : '' }}> Emlékezz rám
                </label>
                <a href="/forgot-password" class="forgot-link">Elfelejtett jelszó?</a>
            </div>

            <button type="submit" class="btn-submit">Belépés</button>
            
            <p class="form-footer">Még nincs fiókod? <a href="{{ route('register') }}">Regisztrálj most!</a></p>
        </form>
    </div>
</section>
@endsection