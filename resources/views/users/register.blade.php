@extends('layout.app')

@section('content')
<section class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h2>Regisztráció</h2>
            <p>Csatlakozz a Budapest360 közösséghez!</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="input-group">
                <label for="name">Felhasználónév</label>
                <input type="text" name="name" id="name" placeholder="gipsz_Jakab123" value="{{ old('name') }}" required>
                @error('name') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <label for="email">E-mail cím</label>
                <input type="email" name="email" id="email" placeholder="pelda@email.hu" value="{{ old('email') }}" required>
                @error('email') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <label for="password">Jelszó</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
                @error('password') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">Jelszó újra</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-submit">Regisztrálok</button>
            
            <p class="form-footer">Van már fiókod? <a href="/users">Lépj be itt!</a></p>
        </form>
    </div>
</section>
@endsection