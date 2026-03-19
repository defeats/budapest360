@extends('layouts.app')
<!--TODO-->
@section('content')
<div class="form-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-card">
                <div class="card-header">{{ __('Erősítsd meg az e-mail címed') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ellenőrző hivatkozást küldtünk az e-mail címére.') }}
                        </div>
                    @endif

                    {{ __('Mielőtt folytatná, kérjük, ellenőrizze az e-mailjeit, hogy kapott-e ellenőrző linket.') }}
                    {{ __('Ha nem kapott emailt') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('ide kattinva tud újat kérni') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
