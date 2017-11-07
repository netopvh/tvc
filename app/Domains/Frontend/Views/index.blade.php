@extends('layout.frontend.app')

@section('player')
    @include('layout.frontend.partials.player')
@stop

@section('eventos-home')
    @include('eventos.home')
@stop

@section('destaques-home')
    @include('noticias.destaques')
@stop

@section('noticias-home')
    @include('noticias.home')
@stop