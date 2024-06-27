@extends('layout.master')
@section('title', 'Usuarios')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/users/list-users.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop


@section('content')

    <div class="col-md-12 col-sm-12">
        <div class="header">
            <img src="https://primax.com.pe/wp-content/uploads/2023/06/gnv-bottom-banner-e1687985521379.png" class="img-fluid" alt="Responsive image">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 contents">
                <div class="card ">
                    <div class="body table">
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#add-user" class="btn-add">
                            <img class="img-add"src="{{ asset('assets/images/icons/plus.svg') }}" alt="add">
                            Crear usuario nuevo
                        </a>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#import-users" class="btn-add-massive">
                            <img class="img-add"src="{{ asset('assets/images/icons/plus.svg') }}" alt="add">
                            Registro masivo de usuarios
                        </a>
                        <div class="table-responsive">
                            <table id="table_users" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">Cod</th>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Apellidos</th>
                                        <th class="text-center">Nickname</th>
                                        <th class="text-center">Documento de identidad</th>
                                        <th class="text-center">Teléfono</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $user->id }}</th>
                                        <td >{{ $user->name }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->nickname }}</td>
                                        <td>{{ $user->document_number }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->active == 1 ? 'Activo' : 'Inactivo' }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn-actions"><img class="img-actions"
                                                    src="{{ asset('assets/images/icons/edit.svg') }}"
                                                    alt="edit"></a>
                                            @if ($user->active == 0)
                                                <a id="enable-user" onclick="enableUser({{ $user->id }})"
                                                    class="btn-actions" data-type="confirm">
                                                    <img class="img-actions" src="{{ asset('assets/images/icons/eye.svg') }}" alt="enable">
                                                </a>
                                            @else
                                                <a id="disable-user" onclick="disableUser({{ $user->id }})"
                                                    class="btn-actions" data-type="confirm">
                                                    <img class="img-actions"
                                                        src="{{ asset('assets/images/icons/eye-off.svg') }}"
                                                        alt="disable">
                                                </a>
                                            @endif
                                            <a onclick="deleteUser({{ $user->id }})" class="btn-actions"><img class="img-actions"
                                                    src="{{ asset('assets/images/icons/trash.svg') }}"
                                                    alt="delete"></a>
                                            <a onclick='resetPassword("{{ $user->email }}")' class="btn-reset" >Reset password</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--ADD Users -->
    <div class="modal fade" id="add-user" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-users" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="title-modal" id="largeModalLabel">Crear nuevo usuario</h2>
                </div>
                <div class="modal-body">
                    <div class="body">
                        <form id="form-user" class="form-horizontal" >
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="name">Nombres</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="name" type="text" id="name" class="form-control" placeholder="Ingrese el nombre del usuario">
                                    <div id="error_name_module"></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="lastname">Apellidos</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="lastname" type="text" id="lastname" class="form-control"  placeholder="Ingrese el apellido del usuario">
                                    <div id="error_lastname_module"></div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="document_number">Documento de identidad</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="document_number" type="text" id="document_number" class="form-control"  placeholder="Ingrese el documento de identidad del usuario">
                                    <div id="error_document_number_module"></div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="nickname">Nickname</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="nickname" type="text" id="nickname" class="form-control"  placeholder="Ingrese el nickname del usuario">
                                    <div id="error_nickname_module"></div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="phone">Teléfono</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="phone" type="tel" id="phone" class="form-control" placeholder="Ingrese el teléfono de identidad del usuario">
                                    <div id="error_phone_module"></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <input name="email" type="email" id="email" class="form-control" required placeholder="Ingrese el correo electrónico de identidad del usuario">
                                    <div id="error_email_module"></div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="position_id">Cargo</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="position_id" class="form-control show-tick ms select2" data-placeholder="Seleccionar" id="position_id">
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error_position_id_module"></div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="country_id">País</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="country_id" class="form-control show-tick ms select2" data-placeholder="Seleccionar" id="country_id">
                                        @foreach($countrys as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error_country_id_module"></div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="gender_id">Género</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="gender_id" class="form-control show-tick ms select2" data-placeholder="Seleccionar" id="gender_id">
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error_gender_id_module"></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="labor_area_id">Establecimiento</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="labor_area_id" class="form-control show-tick ms select2" data-placeholder="Select" id="labor_area_id">
                                        @foreach($labor_areas as $labor_area)
                                            <option value="{{ $labor_area->id }}">{{ $labor_area->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error_labor_area_id_module"></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="active">Perfil</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="profile_id" class="form-control show-tick ms select2" data-placeholder="Select" id="profile_id">
                                        @foreach($profiles as $profiles)
                                            <option value="{{ $profiles->id }}">{{ $profiles->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error_profile_id_module"></div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 form-control-label">
                                    <label for="active">Estado</label>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 form-group">
                                    <select name="active" class="form-control show-tick ms select2" data-placeholder="Select" id="active">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    </select>
                                    <div id="error_active_module"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-save store-user">Crear</button>
                    <button type="button" class="btn-cancel" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    @include('users.import-users')

@stop
@section('page-script')
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets/js/users/users.js')}}"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
@stop


