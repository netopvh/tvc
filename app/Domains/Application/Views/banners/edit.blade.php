@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Banners
        @endslot
    @endcomponent
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.users.add') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title"><i class="icon-forward"></i> Alterar banner<a
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
                    <form action="{{ route('admin.banners.update',['id'=>$banner->id]) }}" class="form-validate-jquery" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <legend class="text-semibold">Entre com as informações</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Parceiro / Anunciante:</label>
                                        <select name="parceiro_id" class="select-search" required>
                                            <option value="">SELECIONE O PARCEIRO</option>
                                            @foreach($parceiros as $parceiro)
                                                <option value="{{ $parceiro->id }}"{{ selected($banner->parceiro_id,$parceiro->id) }}>{{ $parceiro->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Expira em: <span class="text-danger text-size-mini">*Sem data limite deixe em branco</span></label>
                                        <input name="data_limite" value="{{ $banner->data_limite }}" type="text" class="form-control datepicker">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Posição: </label>
                                        <select name="posicao" class="select" required>
                                            <option value="T"{{ selected($banner->posicao,'T') }}>TOPO</option>
                                            <option value="B"{{ selected($banner->posicao,'B') }}>BOX</option>
                                            <option value="L"{{ selected($banner->posicao,'L') }}>LATERAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="display-block">Imagem Atual:</label>
                                        <img src="{{ asset('storage/banners/'.$banner->imagem) }}" width="200" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="display-block">Arquivo do Banner: <span class="text-danger text-size-mini">*Somente .jpg|.png|.gif</span></label>
                                        <input name="imagem" type="file" class="file-styled" required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <a href="{{ route('admin.banners') }}" class="btn btn-info legitRipple"><i
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