@extends('layout.master')
@section('title', 'Reporte Asistencia')
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
            <h3 class="title-report">Reportes<span class="title-color"> Asistencia</span></h3>
            <a href="{{ route('attendance-report.download') }}" class="btn-download-report">Descargar Excel</a>

        </div>
        <div class="table-responsive">
            <table id="attendance-table" class="table dt-responsive nowrap data-auto-refresh display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Capacitación</th>
                        <th class="text-center">Lugar</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Modulador</th>
                        <th class="text-center"># Asistentes</th>
                        <th class="text-center">Asistentes</th>
                    </tr>
                </thead>

                <tbody>
                    @php $n = 1; @endphp
                    @foreach ($attendanceReports as $attendanceReport)
                    <tr>
                        <td class="text-center">{{ $n }}</td>
                        <td>{{ $attendanceReport->course_name }}</td>
                        <td>{{ $attendanceReport->location }}</td>
                        <td>{{ $attendanceReport->start_date }}</td>
                        <td>{{ $attendanceReport->trainer_name }}  {{$attendanceReport->trainer_lastname }} </td>
                        <td class="text-center">{{ $attendanceReport->attendance_count }}</td>
                        <td class="text-center">
                            <button class="btnlook" onclick="showAttendanceReport('{{ $attendanceReport->userAttendance }}')"><img src="{{ asset('/assets/images/plus-circle.svg') }}" class="preview-img"></button>

                        </td>
                    </tr>
                    @php $n += 1; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('reports.user-attendance')



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