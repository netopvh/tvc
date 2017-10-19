@extends('layout.backend.app')

@section('page-header')
    @component('layout.backend.components.header')
        @slot('title')
            Parceiros
        @endslot
    @endcomponent
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('admin.parceiros.create') }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.parceiros.store') }}" id="frm_parceiros" class="form-validate-jquery" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-semibold">Entre com as informações</legend>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nome: <span class="text-danger">*</span></label>
                                        <input name="nome" type="text" class="form-control text-uppercase" required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipo de Pessoa:</label>
                                        <select name="tp_pessoa" id="tp_pessoa" class="select" placeholder="Selecione">
                                            <option value="">SELECIONE</option>
                                            <option value="F">PESSOA FÍSICA</option>
                                            <option value="J">PESSOA JURÍDICA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CPF/CNPJ:</label>
                                        <input name="cpf_cnpj" id="cpf_cnpj" type="text" class="form-control text-uppercase">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Email: <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Responsável:</label>
                                        <input type="text" name="responsavel" class="form-control text-uppercase">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Telefone:</label>
                                        <input type="tel" id="tel" name="telefone" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <a href="{{ route('admin.noticias') }}" class="btn btn-info legitRipple"><i class="icon-database-arrow"></i> Retornar</a>
                            <button type="submit" class="btn btn-primary legitRipple">Salvar Registro <i
                                        class="icon-database-insert position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop