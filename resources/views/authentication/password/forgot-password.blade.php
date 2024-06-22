@extends('layout.authentication')
@section('title', 'Recuperar contraseña')
@section('content')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/passwords.css') }}">
@stop


<div class="row container-body">

    <div class="col-lg-6 col-sm-12 img_back_left content-forgot">

        <img class="logo_protela" src="{{ asset('assets/images/logo-login.png') }}" alt="Logo" />

        <div class="form-forgot">
            <p class="h1_p">Recuperar contraseña</p>
            <p class="p-text">Enviaremos un link a su correo electrónico para restablecer su contraseña</p>
        <form class="card auth_form" method="POST" action="{{ route('sentLinkPassword.forgot') }}">
            @csrf
            <div class="col-12">
                <div class="form-control-label">
                    <label for="email">Correo Electrónico</label>
                    <div class="form-group">
                        <input name="email" type="text" id="email" class="form-control"
                            placeholder="Ingrese su correo Electrónico">
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <button class="btn btn-send">Enviar link</button>
        </form>
        </div>
    </div>

    <div class="col-lg-6 col-sm-12 img_back_right">
    </div>
</div>

@stop
