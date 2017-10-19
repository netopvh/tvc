@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Parceiros e Anunciantes
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
                    <a href="{{ route('admin.parceiros.create') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                </div>
                <div class="table-responsive">
                    <table id="tbl_parceiros" class="table table-framed table-bordered table-striped text-size-base"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th width="70">#</th>
                            <th>Nome / Empresa</th>
                            <th>CPF / CNPJ</th>
                            <th>Email</th>
                            <th>Contato</th>
                            <th width="80" class="text-center">Ações</th>
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