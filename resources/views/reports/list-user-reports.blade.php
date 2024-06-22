@extends('layout.master')
@section('title', 'Library')
@section('page-style')
<link rel="stylesheet" href="{{ asset('assets/css/library/index-library.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" />
@stop

@section('content')
<div class="col-md-12 col-sm-12">
    <div class="header">
        <img src="{{ asset('assets/images/banner.png') }}" class="img-fluid" alt="Responsive image">
    </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="body table content-edit">

        <div class="table-responsive">
            <table id="library-table" class="table dt-responsive nowrap data-auto-refresh" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Cod</th>
                        <th class="text-center">Nombres</th>
                        <th class="text-center">Apellido</th>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Área laboral</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Perfil</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Cant. Rutas</th>
                        <th class="text-center">Detalles Rutas</th>
                        <th class="text-center">Cant. Cursos</th>
                        <th class="text-center">Detalles Cursos</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($usersDataReports as $userDataReport)
                    <tr>
                        <th scope="row" class="text-center">{{ $i }}</th>
                        <td>{{ $userDataReport->name_user }}</td>
                        <td>{{ $userDataReport->lastname }}</td>
                        <td>{{ $userDataReport->document }}</td>
                        <td>{{ $userDataReport->workplace }}</td>
                        <td>{{ $userDataReport->email }}</td>
                        <td>{{ $userDataReport->profile_name }}</td>
                        <td>{{ $userDataReport->state_user }}</td>
                        <td>{{ $userDataReport->count_learning_paths }}</td>
                        <td>Ver mas</td>
                        <td>{{ $userDataReport->count_user_courses }}</td>
                        <td>Ver menos</td>
                        <?php $i++;?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
@section('page-script')
<script src="{{ asset('assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/ui/sweetalert.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/forms/dropify.js') }}"></script>
<script src="{{ asset('assets/js/library/library.js') }}"></script>
@stop