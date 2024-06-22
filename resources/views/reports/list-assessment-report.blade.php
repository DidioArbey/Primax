@extends('layout.master')
@section('title', 'Reporte evaluaciones')
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
            <h3 class="title-report">Reportes<span class="title-color"> Evaluaciones</span></h3>
            <a href="{{ route('assessments-report.download') }}" class="btn-download-report">Descargar Excel</a>
        </div>
        <div class="table-responsive">
            <table id="assessment-table" class="table dt-responsive nowrap data-auto-refresh display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Evaluación</th>
                        <th class="text-center">Curso</th>
                        <th class="text-center">Ruta</th>
                        <th class="text-center"># Evaluados</th>
                        <th class="text-center"># Aprobados</th>
                        <th class="text-center"># No Aprobados</th>
                        <th class="text-center">% Aprobados</th>
                        <th class="text-center">% No Aprobados</th>
                        <th class="text-center">Evaluados</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($assessmentsReports as $assessmentsReport)
                    <tr>
                        <td class="text-center">{{ $assessmentsReport->assessment_id }}</td>
                        <td>{{ $assessmentsReport->assessment_name }}</td>
                        <td>{{ $assessmentsReport->course_name }}</td>
                        <td>{{ $assessmentsReport->learning_path_name }}</td>
                        <td class="text-center">{{ $assessmentsReport->users_evaluated }}</td>
                        <td class="text-center">{{ $assessmentsReport->user_approved_count }}</td>
                        <td class="text-center">{{ $assessmentsReport->user_not_approved_count }}</td>
                        <td class="text-center">{{ number_format($assessmentsReport->percentage_approved, 1) }} %</td>
                        <td class="text-center">{{  number_format($assessmentsReport->percentage_not_approved, 1) }} %</td>
                        <td class="text-center">
                            <button class="btnlook" onclick="showAssessmentReport('{{ $assessmentsReport->userAssessments }}')"><img src="{{ asset('/assets/images/plus-circle.svg') }}" class="preview-img"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include('reports.user-assessments')

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