@extends('layout.master')
@section('title', 'Reports History')
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
            <h3 class="title-report">Reportes<span class="title-color"> Historicos</span></h3>
        </div>
        <div class="table-responsive">
            <table id="assessment-table" class="table dt-responsive nowrap data-auto-refresh display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Codigo</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-center">1 </td>
                        <td>Induccion corporativa compañia informe </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/1. INDUCCION CORPORATIVA COMPAÑIA INFORME.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2 </td>
                        <td>Curso RCS actualización año 2023 </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/2. Curso RCS actualización año 2023.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">3 </td>
                        <td>Gestor líder estratégico </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/3. Gestor líder estratégico.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">4 </td>
                        <td>Reinduccion corporativa </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/4. REINDUCCION CORPORATIVA.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">5 </td>
                        <td>Protela Live (lunes 7 de marzo) </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/5. Protela Live (Lunes 7 de marzo).csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">6 </td>
                        <td>Prueba gamificación y certificados </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/6. Prueba Gamificación y certificados.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8.1 </td>
                        <td>Presentacion acuerdos comerciales, normas de origen </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/8.1 PRESENTACION ACUERDOS COMERCIALES, NORMAS DE ORIGEN.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8.2.1 </td>
                        <td>Sabes que es gama </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/8.2.1 sabes que es gama.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8.2.2 </td>
                        <td>Habeas data </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/8.2.2 Habeas Data.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8.2.3 </td>
                        <td>Implementación modulo office 365 </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/8.2.3 Implementación modulo office 365.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8.2.4 </td>
                        <td>Seguridad de la información protela </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/8.2.4 Seguridad de la información protela.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">9 </td>
                        <td>Lideres maestros transformando con sentido </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/9. Lideres maestros transformando con sentido.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">12 </td>
                        <td>Conciencia ambiental </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/12. Conciencia Ambiental.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">13 </td>
                        <td>Capacitación técnica tejeduria por urdimbre </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/13. Capacitación Técnica Tejeduria por Urdimbre.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">15 </td>
                        <td>Medidas de seguridad de la empresa </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/15. Medidas de seguridad de la Empresa.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">16 </td>
                        <td>Trazabilidad de material reciclado certificado nivel 1 </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/16. Trazabilidad de material reciclado Certificado Nivel 1.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">17 </td>
                        <td>Trazabilidad de material reciclado certificado nivel 2 </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/17. Trazabilidad de material reciclado certificado nivel 2.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">18 </td>
                        <td>Formación auditores </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/18. Formación Auditores.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">19 </td>
                        <td>Capacitación financiera </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/19. Capacitación financiera.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.1 </td>
                        <td>Reinducción cargos críticos operador económico autorizado (OEA) </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.1 Reinducción cargos críticos operador económico autorizado (OEA).csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.2 </td>
                        <td>Seguridad sellos satelitales </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.2 Seguridad sellos satelitales.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.3 </td>
                        <td>Sagrilaft </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.3 Sagrilaft.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.4 </td>
                        <td>Prevención y mitigación de riesgos en transporte </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.4 Prevención y mitigación de riesgos en transporte.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.5 </td>
                        <td>Fundamentos del proceso de envío, recibo, manejo y almacenamiento de carga </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.5 Fundamentos del proceso de envió, recibo, manejo y almacenamiento de carga.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">20.6 </td>
                        <td>Situación de pánico en proceso de cargue y descargue de mercancía </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/20.6 Situación de pánico en proceso de cargue y descargue de Mercancía.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">21 </td>
                        <td>Divulgación-prueba </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/21. DIVULGACIÓN-PRUEBA.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">22 </td>
                        <td>Curso manejo del tiempo </td>
                        <td class="text-center">
                            <a href="{{ asset('/assets/history/22. Curso Manejo del Tiempo.csv') }}" download>
                                <img src="{{ asset('/assets/images/icons/download.svg') }}" class="preview-img">
                            </a>
                        </td>
                    </tr>

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
<script src="{{ asset('assets/js/reports/reports.js') }}"></script>
@stop