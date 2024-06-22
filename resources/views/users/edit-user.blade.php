@extends('layout.master')
@section('title', 'Editar usuario')
@section('parentPageTitle', 'Usuarios')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/edit-user.css') }}">
@stop
@section('content')

    <div class="collapse show col-lg-12 col-md-12 col-sm-12" id="editSections">
        <h1 class="title">Editar usuario <span class="title-color">{{ $user->name }} {{ $user->lastname }}</span></h1>
        <div class="body content-edit">
            <form method="POST" class="form-horizontal" action="/user/update/{{ $user->id }}" >
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
                        <label for="document_number">Documento de identidad</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-7">
                        <input name="document_number" type="text" id="document_number" class="form-control" value="{{ $user->document_number }}">
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
                    <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                        <label for="labor_area_id">Área</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <select name="labor_area_id" class="form-control show-tick ms select2" data-placeholder="Select"
                            id="labor_area_id">
                            @foreach ($labor_areas as $labor_area)
                                @if ($user->labor_area_id == $labor_area->id)
                                    <option value="{{ $labor_area->id }}" selected>{{ $labor_area->name }}</option>
                                @else
                                    <option value="{{ $labor_area->id }}">{{ $labor_area->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                        <label for="active">Perfil</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <select name="profile_id" class="form-control show-tick ms select2" data-placeholder="Select"
                            id="profile_id">
                            @foreach ($profiles as $profile)
                                @if ($user->profile_id == $profile->id)
                                    <option value="{{ $profile->id }}" selected>{{ $profile->name }}</option>
                                @else
                                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 form-control-label">
                        <label for="active">Estado</label>
                    </div>
                    <div class="col-lg-10  col-md-10 col-sm-10">
                        <select name="active" class="form-control show-tick ms select2" data-placeholder="Select" id="active">
                            @if ($user->active == 1)
                                    <option value="1" selected>Activo</option>
                                    <option value="0">Inactivo</option>
                                @else
                                    <option value="0" selected>Inactivo</option>
                                    <option value="1" >Activo</option>
                                @endif
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
@stop
@section('page-script')
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
@stop
