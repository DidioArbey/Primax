@extends('layout.master')
@section('title', 'Home')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/home/home.css') }}">
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
@stop


@section('content')

<div class="col-md-12 col-sm-12">
    <div class="header">
        <img src="https://primax.com.pe/wp-content/uploads/2023/06/gnv-bottom-banner-e1687985521379.png" class="img-fluid" alt="Responsive image">
    </div>
</div>
<br>
<br>
<br>

    <div class="container">
        <!-- Tarjetas de Cursos -->
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Curso 1">
                    <div class="card-body">
                        <h5 class="card-title">Curso 1</h5>
                        <h4 class="card-tittle2">Titulo Curso 1</h4>
                        <p class="card-text">Descripción breve del Curso 1.</p>
                        <a href="#" class="btn ">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Curso 2">
                    <div class="card-body">
                        <h5 class="card-title">Curso 2</h5>
                        <h4 class="card-tittle2">Titulo Curso 2</h4>
                        <p class="card-text">Descripción breve del Curso 2.</p>
                        <a href="#" class="btn ">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Curso 3">
                    <div class="card-body">
                        <h5 class="card-title" >Curso 3</h5>
                        <h4 class="card-tittle2">Titulo Curso 3</h4>
                        <p class="card-text">Descripción breve del Curso 3.</p>
                        <a href="#" class="btn ">Ver Curso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76A8fF6b9sA1W8eALb6a5pqF3rWOnQ8pR4j6YkH3eRtY9Tyt2w2ePZfk2We/e9B" crossorigin="anonymous"></script>



@stop

@section('page-script')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <script src="{{ asset('assets/js/home/home.js') }}"></script>

@endsection
