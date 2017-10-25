@extends('layout.frontend.app')

@section('eventos-home')
    @include('eventos.home')
@stop

@section('destaques-home')
    @include('noticias.destaques')
@stop

@section('noticias-home')
    @include('noticias.home')
@stop