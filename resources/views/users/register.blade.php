@extends('layout.app')

@section('content')
    <div class="form-container">
        <form action="{{ route('users.store') }}" method="POST">
            <label for="name">Felhasználónév</label>
            <input type="text" id="name" name="name">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email">
            <label for="password">Jelszó</label>
            <input type="password" id="password" name="password">
            <label for="password-confirm">Jelszó megerősítése</label>
            <input type="password" id="password-confirm" name="password_confirmation">
            <button type="submit">Regisztrálok</button>
        </form>
    </div>
@endsection