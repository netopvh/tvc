@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Banners
        @endslot
    @endcomponent
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.banners') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <br>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_banners" class="table table-framed table-bordered table-striped text-size-base"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th width="70">#</th>
                            <th>Parceiro/Anunciante</th>
                            <th>Prazo Limite</th>
                            <th>Imagem</th>
                            <th>Posicao</th>
                            <th>Status</th>
                            <th>Data Cadastro</th>
                            <th width="40" class="text-center">Ações</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Remoção de registro</h4>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja remover este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Remover</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@stop