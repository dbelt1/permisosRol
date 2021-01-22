@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificación de correo eléctronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nuevo link de verificación ha sido enciado a tu correo.') }}
                        </div>
                    @endif
                    <h3>{{ __('Hola!') }}</h3>
                    {{ __(' nos da gusto de que estes aqui.') }}
                    {{ __('debes validar tu correo para continuar.') }}
                    {{ __('Si no has recibido el correo puedes reenviarlo desde este link') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click Aquí para reenvíar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
