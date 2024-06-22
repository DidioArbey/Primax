@extends('layout.master')
@section('title', 'Reporte usuarios')
@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/reports/index-reports.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
@stop

@section('content')
<div class="col-md-12 col-sm-12">
    <div class="header">
        <img src="{{ asset('assets/images/banner.png') }}" class="img-fluid" alt="Responsive image">
    </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="body table content-edit">
        <div class="content-activities">
        <h3 class="title-report">Reporte<span class="title-color"> Usuarios</span></h3>
        <a href="{{ route('users-report.download') }}" class="btn-download-report">Descargar Excel</a>
        </div>
        <div class="table-responsive">
            <table id="users-table" class="table display dt-responsive nowrap data-auto-refresh" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Área laboral</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Perfil</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Cant. Rutas</th>
                        <th class="text-center">Rutas</th>
                        <th class="text-center">Cant. Cursos</th>
                        <th class="text-center">Cursos</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($usersDataReports as $userDataReport)
                    <tr>
                        <td class="text-center">{{ $userDataReport->user_id }}</td>
                        <td>{{ $userDataReport->name_user }}</td>
                        <td>{{ $userDataReport->lastname }}</td>
                        <td>{{ $userDataReport->document }}</td>
                        <td>{{ $userDataReport->workplace }}</td>
                        <td>{{ $userDataReport->email }}</td>
                        <td>{{ $userDataReport->profile_name }}</td>
                        <td class="text-center" >{{ $userDataReport->state_user == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td class="text-center" >{{ $userDataReport->count_learning_paths }}</td>
                        <td>
                            <button class="btnlook" onclick="showLearningPaths('{{ $userDataReport->userlearningPaths }}')"><img src="{{ asset('/assets/images/plus-circle.svg') }}" class="preview-img"></button>
                        </td>
                        <td  class="text-center">{{ $userDataReport->count_user_courses }}</td>
                        <td>
                            <button class="btnlook" onclick="showCourses('{{ $userDataReport->userCourses }}')"><img src="{{ asset('/assets/images/plus-circle.svg') }}" class="preview-img"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('reports.user-learning-path')
@include('reports.user-courses')


@stop
@section('page-script')
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/js/reports/reports.js') }}"></script>
@stop