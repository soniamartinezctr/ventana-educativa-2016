@section('titleMediateca')
    Mediateca
@stop
@extends('indexMediateca')
@section('menuMediateca')
	@include('viewMediateca.encabezadoMediateca')
@endsection
@section('cuerpoMediateca')
	@include('viewMediateca.cuerpoSemestreIII')
        @include('viewMediateca.barraSociales')
@endsection
@section('pieMediateca')
    @include('viewMediateca.pieMediateca')
@endsection