@extends('layout.authentication')
@section('title', 'Register')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>

<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/multi-select/css/multi-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>

<style>
    .select2-container .select2-choice {
        background-color: #f5f5f5 !important;
    }

    label.error{
        margin-bottom: 0px !important;
    }
</style>
@stop
@section('content')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <form method="POST" class="card auth_form" action="{{ route('register') }}" novalidate>
            @csrf
            <!--            <div class="header">
                            <img class="logo" src="{{asset('assets/images/logo_referencia.png')}}" alt="">
                            <h5>Registrate</h5>
                            <span>Register a new membership</span>
                        </div>-->

            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group form-group form-float">
                                <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Nombre(s)">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @if ($errors->has('name'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group form-group form-float">
                                <input name="lastname" value="{{ old('lastname') }}" required type="text" class="form-control" placeholder="Apellido(s)">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @if ($errors->has('lastname'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('lastname') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group form-group form-float">
                                <input name="document_number" value="{{ old('document_number') }}" required type="number" class="form-control" placeholder="Cédula">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment-account"></i></span>
                                </div>
                                @if ($errors->has('document_number'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('document_number') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3"> 
                            <div class="input-group form-group masked-input">
                                <!--<input name="birthday" value="{{ old('birthday') }}" type="text" class="form-control date" placeholder="Fecha de Nacimiento">-->
                                <input name="birthday" value="{{ old('birthday') }}" required type="text" class="form-control datepicker" placeholder="Fecha Nacimiento">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                @if ($errors->has('birthday'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('birthday') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group form-group form-float">
                                <input name="phone" value="{{ old('phone') }}" required type="text" class="form-control" placeholder="Celular">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-smartphone"></i></span>
                                </div>
                                @if ($errors->has('phone'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row clearfix">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="input-group form-group form-float">
                                <input name="email" value="{{ old('email') }}" required type="text" class="form-control" placeholder="Correo Electrónico">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                @if ($errors->has('email'))
                                <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
               
               
                <div class="input-group form-group form-float">
                    <div class="checkbox">
                        <input name="terms_conditions" id="remember_me" type="checkbox">
                        <label for="remember_me">Acepto que he leído los <a href="https://listopagoaplazos.com/politicas-comercio" target="_blank">Términos y Condiciones de uso</a></label>
                    </div>
                    @if ($errors->has('terms_conditions'))
                    <label id="minmaxlength-error" class="error" for="minmaxlength">{{ $errors->first('terms_conditions') }}</label>
                    @endif
                </div>
                <button class="btn btn-primary btn-block waves-effect waves-light">REGISTRARME</button>
                <div class="signin_with mt-3">
                    ¿Ya está registrado?<a class="link" href="{{route('login')}}"> Inicia Sesión</a>
                </div>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/registro_img.png')}}" alt="Sign Up" />
        </div>
    </div>
</div>
@stop

@section('page-script')
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('assets/plugins/nouislider/nouislider.js')}}"></script>
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<!--<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>-->

<script>
                $(document).ready(function () {

                    //Masked Input =========
                    var $demoMaskedInput = $('.masked-input');

                    //Date
                    $demoMaskedInput.find('.date').inputmask('yyyy/mm/dd', {placeholder: '____/__/__'});

                    $('.select2').select2();

                    $('.datetimepicker').bootstrapMaterialDatePicker({
                        format: 'dddd DD MMMM YYYY - HH:mm',
                        clearButton: true,
                        weekStart: 1
                    });

                    $('.datepicker').bootstrapMaterialDatePicker({
                        format: 'YYYY-MM-DD',
                        clearButton: true,
                        weekStart: 1,
                        time: false
                    });

                    $('.timepicker').bootstrapMaterialDatePicker({
                        format: 'HH:mm',
                        clearButton: true,
                        date: false
                    });

                    $('select[name="department"]').on('change', function () {
                        var department_id = $(this).val();
                        if (department_id) {
                            $.ajax({
                                url: '/cities/' + department_id,
                                type: "GET",
                                dataType: "json",
                                beforeSend: function () {
                                    $('#loader').css("visibility", "visible");
                                },
                                success: function (data) {

                                    $('select[name="city"]').empty();

                                    $('select[name="city"]').append('<option value="">Ciudad</option>');
                                    $.each(data, function (key, value) {

                                        $('select[name="city"]').append('<option value="' + value + '">' + key + '</option>');

                                    });
                                },
                                complete: function () {
                                    $('#loader').css("visibility", "hidden");
                                }
                            });
                        } else {
                            $('select[name="city"]').empty();
                        }

                    });

                    $('select[name="section"]').on('change', function () {
                        var section_id = $(this).val();
                        if (section_id) {
                            $.ajax({
                                url: '/commerce/' + section_id,
                                type: "GET",
                                dataType: "json",
                                beforeSend: function () {
                                    $('#loader').css("visibility", "visible");
                                },
                                success: function (data) {

                                    $('select[name="commerce"]').empty();

                                    $('select[name="commerce"]').append('<option value="">Comercio</option>');
                                    $.each(data, function (key, value) {

                                        $('select[name="commerce"]').append('<option value="' + value + '">' + key + '</option>');

                                    });
                                },
                                complete: function () {
                                    $('#loader').css("visibility", "hidden");
                                }
                            });
                        } else {
                            $('select[name="commerce"]').empty();
                        }

                    });

                });

</script>

@stop