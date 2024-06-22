@extends('layout.master')
@section('title', 'Home')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/css/home/home.css') }}">
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
@stop


@section('content')

    


@stop

@section('page-script')
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <script src="{{ asset('assets/js/home/home.js') }}"></script>
@endsection
