@extends('layout.frontend.app_lat')

@section('content')
    <br>
    <div class="container">
        <div class="noticia">
            <div class="row">
                <div class="col-md-9">
                    <h5 class="text-bold text-uppercase">{{ $noticia->titulo }}</h5>
                    {{ $noticia->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9 text-justify">
                    {!! $noticia->conteudo !!}
                </div>
            </div>
        </div>
    </div>
@stop
