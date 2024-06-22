@extends('layout.master')
@section('title', 'Reporte encuestas')
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
            <h3 class="title-report">Reporte<span class="title-color"> Encuestas de satisfacción</span></h3>
            <a href="{{ route('surveys-report.download') }}" class="btn-download-report">Descargar Excel</a>

        </div>
        <div class="table-responsive">
            <table id="surveys-table" class="table display dt-responsive nowrap data-auto-refresh">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Encuesta</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Curso</th>
                        <th class="text-center">Ruta de aprendizaje</th>
                        <th class="text-center"># Encuestados</th>
                        <th class="text-center">Promedio de satisfacción</th>
                        <th class="text-center">Encuestados</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($surveysDataReports as $surveyDataReport)
                    <tr>
                        <td class="text-center">{{ $surveyDataReport->id_survey }}</td>
                        <td>{{ $surveyDataReport->name_survey }}</td>
                        <td >{{ $surveyDataReport->active == 1 ? 'Activa' : 'Inactiva' }}</td>
                        <td>{{ $surveyDataReport->name_course }}</td>
                        <td>{{ $surveyDataReport->name_learning_path }}</td>
                        <td class="text-center">{{ $surveyDataReport->count_surveys }}</td>
                        <td class="text-center">{{ number_format( $surveyDataReport->average_satisfaction_survey,1) }} %</td>
                        <td class="text-center">
                            <button class="btnlook" onclick="showUsersSurvey('{{ $surveyDataReport->usersSurvey }}')"><img src="{{ asset('/assets/images/plus-circle.svg') }}" class="preview-img"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('reports.survey-users')



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