@extends('layout.app')

@section('content')
    <div class="form-container">
        <form action="" method="POST">
            <label for="name">Felhasználónév</label>
            <input type="text" id="name" name="name">
            <label for="email">E-mail</label>
            <input type="text" id="email" name="email">
            <label for="password">Jelszó</label>
            <input type="password" id="password" name="password">
            <button type="submit">Bejelentkezem</button>
        </form>
    </div>
@endsection