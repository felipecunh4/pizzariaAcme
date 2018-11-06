@extends('adminlte::page')

@section('Cadastro de Bebidas', 'Pizzaria Tech')

@section('content_header')
    <h1>Cadastrar Refeição</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)"><i class="fa fa-plus-square"></i>Cadastrar</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(1)">Refeições</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h4>Refeição</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome Refeição</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class=""></i></span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Preço</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class=""></i></span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop