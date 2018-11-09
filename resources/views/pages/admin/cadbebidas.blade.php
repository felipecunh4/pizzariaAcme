@extends('adminlte::page')

@section('Cadastro de Bebidas', 'Pizzaria Tech')

@section('content_header')
    <h1>Cadastrar Bebida</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="fa fa-plus-square"></i>Cadastrar</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(1)">Bebidas</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h4>Cadastro</h4>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Código (SKU)</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Quantidade</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Preço</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Tamanho</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-arrows-v"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Marca</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-puzzle-piece"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Categoria</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Sub-Categoria</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop