<!--Import users -->
<div class="modal fade" id="import-users" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-import-users" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="title-modal" id="largeModalLabel">Registro de usuarios masivo</h2>
            </div>
            <div id="error_import_users">
                <table id="table_errors" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fila N°</th>
                            <th>Detalles del registro</th>
                        </tr>
                    </thead>
                    <tbody id="table_users_import_error"></tbody>
                </table>
                <a href="{{ route('users.list') }}" class="btn-back">Volver</a>
            </div>
            <center><img id="loading" src="{{asset('assets/images/loader.gif')}}" /></center>
            <div class="modal-body" id="modal_body_users_import">
                <div class="body">
                    <form id="form-import-user" class="form-horizontal" enctype="multipart/form-data" novalidate="" method="post">
                        @csrf
                        <div class="row clearfix">
                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <h5>{{ $error }}</h5>
                                    @endforeach
                                </div>
                            @endif
                            <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                                <label for="excel">1. Descargue y complete el formato de Excel con los datos de los usuarios nuevos</label><br>
                                <a href="{{ asset('assets/formats/users.xlsx') }}">Click aquí</a> para descargar el archivo
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-control-label">
                                <label for="excel">2. Suba el archivo diligenciado en formato Excel</label>
                                <input required name="excel" value="" id="excel" type="file" class="dropify" data-allowed-file-extensions="xls xlsx">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer" id="modal_footer_users_import">
                <button type="button" class="btn-save" onclick="import_users()">Crear</button>
                <button type="button" class="btn-cancel" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
