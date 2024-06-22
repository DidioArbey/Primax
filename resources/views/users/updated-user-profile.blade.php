@extends('layout.master')
@section('title', 'Editar perfil')
@section('parentPageTitle', 'Usuarios')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/edit-user.css') }}">
@stop
@section('content')
<div class="collapse show col-lg-12 col-md-12 col-sm-12" id="editSections">
    <h1 class="title">Editar  <span class="title-color">Perfil</span></h1>
    <div class="body content-edit">
        <form method="POST" class="form-horizontal" action="/profile/update/{{ $user->id }}" >
            @csrf
            <div class="row clearfix">
                <input name="id" value="{{ $user->id }}" type="hidden", id="id">
                <div class="col-lg-2  col-md-2 col-sm-2  form-control-label">
                    <label for="name">Nombres</label>
                </div>
                <div class="col-lg-10  col-md-10 col-sm-7">
                    <input name="name" type="text" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                    <label for="lastname">Apellidos</label>
                </div>
                <div class="col-lg-10  col-md-10 col-sm-7">
                    <input name="lastname" type="text" id="lastname" class="form-control" value="{{ $user->lastname }}">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                    <label for="phone">Teléfono</label>
                </div>
                <div class="col-lg-10  col-md-10 col-sm-7">
                    <input name="phone" type="tel" id="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                    <label for="email">Email</label>
                </div>
                <div class="col-lg-10  col-md-10 col-sm-7">
                    <input name="email" type="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                    <label for="gender_id">Género</label>
                </div>
                <div class="col-lg-10  col-md-10 col-sm-10">
                    <select name="gender_id" class="form-control show-tick ms select2" data-placeholder="Seleccionar" id="gender_id">
                        @foreach ($genders as $gender)
                            @if ($user->gender_id == $gender->id)
                                <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                            @else
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <button class="btn-action"><img class="img-actions"
                            src="{{ asset('assets/images/icons/edit-2.svg') }}"> EDITAR USUARIO </button>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="collapse show col-lg-12 col-md-12 col-sm-12" id="editSections">
        <h2 class="subtitle">Cambiar <span class="title-color">contraseña</span></h2>
        <div class="body content-edit">
            @if (Session::has('message'))
            <div class="text-danger">
                {{ Session::get('message') }}
            </div>
            @endif
            <form method="post" action="{{ url('/user/password/update') }}">
                @csrf
                <div class="row clearfix">
                    <input name="user_id" value="{{ $user->id }}" type="hidden" id="user_id">
                    <input name="current_password" value="{{ $user->password }}" type="hidden" id="current_password">
                    <div class="col-lg-2  col-md-2 col-sm-2  form-control-label">
                        <label for="mypassword">Contraseña actual</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-7">
                        <input type="password" name="mypassword" class="form-control">
                        <div class="text-danger">{{ $errors->first('mypassword') }}</div>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-2  form-control-label">
                        <label for="password">Nueva contraseña</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-7">
                        <input type="password" name="password" class="form-control">
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-2  form-control-label">
                        <label for="mypassword">Confirmar nueva contraseña</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-7">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <button type="submit" class="btn-action"><img class="img-actions" src="{{ asset('assets/images/icons/edit-2.svg') }}"> CAMBIAR CONTRASEÑA</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@stop
@section('page-script')
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/users/users.js') }}"></script>
@stop
