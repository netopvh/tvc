@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Notícias
        @endslot
    @endcomponent
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.noticias') }}
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
                    <a href="{{ route('admin.noticias.add') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                </div>
                <div class="panel-body">
                    <form action="">
                        <fieldset>
                            <legend>Pesquisar Notícia</legend>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-lg-10">
                                        <div class="input-group">
												<span class="input-group-btn">
													<button class="btn btn-default btn-icon legitRipple"
                                                            type="button"><i class="icon-user"></i></button>
												</span>
                                            <input type="text" name="search" class="form-control text-uppercase upper"
                                                   placeholder="Digite o titulo">
                                            <span class="input-group-btn">
													<button class="btn btn-default legitRipple"
                                                            type="submit">Pesquisar</button>
												</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-framed table-bordered table-striped text-size-base"
                           data-form="deleteForm">
                        <thead>
                        <tr>
                            <th width="70">#</th>
                            <th>Nome Completo</th>
                            <th>Perfil</th>
                            <th width="120">Status</th>
                            <th width="80" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </tbody>
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