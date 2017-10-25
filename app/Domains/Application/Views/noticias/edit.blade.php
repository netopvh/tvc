@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Notícias
        @endslot
    @endcomponent
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.noticias.edit') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"><i class="icon-forward"></i> Alterar notícia<a
                                class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form id="form_noticia" action="{{ route('admin.noticias.update',['id'=> $noticia->id]) }}" class="form-validate-jquery"
                          method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <legend class="text-semibold">Entre com as informações</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Título:</label>
                                        <input name="titulo" value="{{ $noticia->titulo }}" type="text" class="form-control text-uppercase" required
                                               autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="display-block">Notícia em Destaque:</label>
                                        <label>
                                            <input name="destaque" value="1" type="checkbox" data-off-color="danger"
                                                   data-on-text="Sim" data-off-text="Não" class="switch"{{ $noticia->destaque?' checked':'' }}>
                                        </label>
                                    </div>
                                </div>
                                <div id="file_destaque" class="col-md-6{{ $noticia->destaque?'':' collapse' }}">
                                    <div class="form-group">
                                        <label class="display-block">Imagem Destaque:</label>
                                        <input name="imagem" type="file" class="file-styled">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Autor:</label>
                                        <input type="text" value="{{ $noticia->autor }}" class="form-control" name="autor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fonte:</label>
                                        <input type="text" value="{{ $noticia->fonte }}" class="form-control" name="fonte">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Notícia:</label>
                                        <textarea name="conteudo" class="textarea" rows="5" required>{{ $noticia->conteudo }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <a href="{{ route('admin.noticias') }}" class="btn btn-info legitRipple"><i
                                        class="icon-database-arrow"></i> Retornar</a>
                            <button type="submit" class="btn btn-primary legitRipple">Salvar Registro <i
                                        class="icon-database-insert position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop