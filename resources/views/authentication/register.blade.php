@extends('layout.authentication')

@section('title', 'Register')

@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/users/login.css') }}"> @stop

@section('content')

    <div class="row container-body">

        <div class="col-lg-6 col-sm-12 img_back_left content-login">
            <img class="logos" src="{{ asset('assets/images/logo-login.png') }}" alt="Logo" />
            <div class="form-login">
                <p class="h1_p">REGISTRARSE</p>
                <p class="p-text"> ¡Bienvenido a Primax! Por favor, crea tu cuenta </p>
            </div>

            <form class="card auth_form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="col-12">
                    <div class="form-control-label">
                        <label for="name">Nombre(s)</label>
                        <div class="form-group">
                            <input name="name" value="{{ old('name') }}" required type="text" id="name"
                                class="form-control" placeholder="Ingrese sus nombres">
                        </div>
                    </div>
                    <div class="form-control-label">
                        <label for="lastname">Apellido(s)</label>
                        <div class="form-group">
                            <input name="lastname" value="{{ old('lastname') }}" required type="text" id="lastname"
                                class="form-control" placeholder="Ingrese sus apellidos">
                        </div>
                    </div>
                    <div class="form-control-label">
                        <label for="document_number">Cédula</label>
                        <div class="form-group">
                            <input name="document_number" value="{{ old('document_number') }}" required type="number"
                                id="document_number" class="form-control" placeholder="Ingrese su cédula">
                        </div>
                    </div>

                    <div class="form-control-label">
                        <label for="phone">Celular</label>
                        <div class="form-group">
                            <input name="phone" value="{{ old('phone') }}" required type="text" id="phone"
                                class="form-control" placeholder="Ingrese su número celular">
                        </div>
                    </div>

                    <div class="form-control-label">
                        <label for="email">Correo Electrónico</label>
                        <div class="form-group">
                            <input name="email" value="{{ old('email') }}" required type="text" id="email"
                                class="form-control" placeholder="Ingrese su correo electrónico">
                        </div>
                    </div>

                    <div class="input-group form-group form-float">
                        <div class="checkbox">
                            <input name="terms_conditions" id="remember_me" type="checkbox">
                            <label for="remember_me">Acepto que he leído los <a
                                    href="https://www.mineducacion.gov.co/1621/w3-printer-233956.html" target="_blank">Términos y
                                    Condiciones de uso</a></label>
                        </div>
                        @if ($errors->has('terms_conditions'))
                            <label id="minmaxlength-error" class="error"
                                for="minmaxlength">{{ $errors->first('terms_conditions') }}</label>
                        @endif
                    </div>
                </div>

                <button class="btn btn-login">REGISTRARME</button>

                <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>

            </form>

        </div>

        <div class="col-lg-6 col-sm-12  img_back_right">
        </div>

    </div>

@endsection
