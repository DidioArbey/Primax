@extends('layout.master')
@section('title', 'Actualizar contraseña')
@section('parentPageTitle', 'Usuarios')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/edit-user.css') }}">
@stop
@section('content')

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
