@extends('layout.authentication')
@section('title', 'Cambio de contraseña')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/passwords.css') }}">
@stop

@section('content')
    <div class="row container-body">

        <div class="col-lg-6 col-sm-12  cont_left">
        </div>

        <div class="col-lg-6 col-sm-12 cont_right">
            <center><img class="logo" src="{{ asset('assets/images/logo-login.png') }}" alt="Logo" /> </center>

            <div class="change_password">
                <p class="h1_p">Cambio de contraseña</p>
                <p class="p-text">Por favor, ingrese su nueva contraseña </p>
            </div>

            <form class="card auth_form" method="POST" action="{{ route('newPassword.forgot') }}">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-control-label">
                                <label for="email">Correo Electrónico</label>

                                <div class="form-group">
                                    <input name="email" type="text" id="email" class="form-control"
                                        placeholder="Ingrese su correo Electrónico">
                                </div>

                            </div>

                            <div class="form-control-label">
                                <label for="password">Contraseña nueva</label>
                                <div class="form-group">
                                    <input name="password" type="password" id="password" class="form-control"
                                        placeholder="Ingrese su contraseña">
                                </div>
                            </div>

                            <div class="form-control-label">
                                <label for="password">Confirmar contraseña</label>
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" id="password_confirmation"
                                        class="form-control" placeholder="Confirme su contraseña">
                                </div>
                            </div>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn-send">Cambiar contraseña</button>
            </form>
        </div>
    </div>




@stop
