@extends('layout.authentication')
@section('title', 'Login')
@section('content')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/login.css') }}">
@stop

<div class="row container-body">

    <div class="col-lg-6 col-sm-12 img_back_left content-login">
        <img class="logo_protela" src="{{ asset('assets/images/logo.png') }}" alt="Logo" />

        <div class="form-login">


            <p class="h1_p">BIENVENIDOS A PROTELATH.COM</p>
            <p class="p-text"> La plataforma de Talento Humano que nos conecta para estar cada vez más cerca. </p>

            {{-- <p class="h1_p">INICIAR SESIÓN</p>
            <p class="p-text">Si deseas visualizar los detalles y características de la plataforma, debes iniciar sesión
                y tener la cuenta activa. </p> --}}

            <p class="h1_p">INICIAR SESIÓN</p>
        </div>

        <form class="card auth_form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12">
                <div class="form-control-label">
                    <label for="document_number">Documento de identidad</label>
                    <div class="form-group">
                        <input name="document_number" type="text" id="document_number" class="form-control"
                            placeholder="Ingrese su documento de identidad">
                    </div>
                </div>

                <div class="form-control-label">
                    <label for="password">Contraseña</label>
                    <div class="form-group">
                        <input name="password" type="password" id="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>

                </div>
                <br>
                <div class="form-control-label">
                    <label><a href="{{ route('password.forgot') }}" class="forget"><strong>Solicitar contrase&ntilde;a</strong></a></label>
                    <br>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <button class="btn btn-login">Iniciar sesión</button>
        </form>

        {{-- <button class="btn btn-login-microsoft">Iniciar sesión con Microsoft <img class="logo_microsoft"
                src="{{ asset('assets/images/microsoft.png') }}" alt="Logo" /></button> --}}
    </div>

    <div class="col-lg-6 col-sm-12  img_back_right">
    </div>

</div>
@stop
