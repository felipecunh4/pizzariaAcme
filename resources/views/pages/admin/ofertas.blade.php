@extends('adminlte::page')

@section('Cadastro de Refeições', 'Pizzaria Tech')

<link rel="stylesheet" href="{{asset('css/botao-invisivel.css')}}">

@section('content_header')
    <h1>Ofertas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ofertas</a></li>
    </ol>
@stop

@section('content')
    @include('partials.admin._alerts')
    <div class="box">
        <div class="box-header">
            <h4>Adicionar Ofertas</h4>
        </div>
        <div class="box-body">
            <form method="post" action="{{route('save.oferta')}}"  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="dia">Dia da Semana</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <select id="dia" class="form-control" required name="fk_id_dia">
                                    <option value="0"></option>
                                    <option value="1">Domingo</option>
                                    <option value="2">Segunda-Feira</option>
                                    <option value="3">Terça-Feira</option>
                                    <option value="4">Quarta-Feira</option>
                                    <option value="5">Quinta-Feira</option>
                                    <option value="6">Sexta-Feira</option>
                                    <option value="7">Sábado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="preco">Valor da Oferta</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input id="preco" class="form-control" name="vl_oferta" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="opc_cardapio">Opção Cardápio</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                <select id="opc_cardapio" class="form-control">
                                    <option value="0"></option>
                                    <option value="1">Refeição</option>
                                    <option value="2">Bebida</option>
                                    <option value="3">Sobremesa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="opc_ref">Refeição</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                <select id="opc_ref" class="form-control" name="fk_id_cardapio" required>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i>&nbsp;&nbsp;Salvar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="box">
        <div class="box-header">
            <h4>Lista de Ofertas</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Refeição</th>
                            <th>Preço Oferta</th>
                            <th>Preço Normal</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ofertas as $o)
                            <tr>
                                <td>{{$o->nm_dia}}</td>
                                <td>{{$o->nm_cardapio}}</td>
                                <td>{{$o->vl_oferta}}</td>
                                <td>{{$o->vl_cardapio}}</td>
                                <td>
                                    <button id="btn_excluir"
                                            value="{{$o->id_oferta}}"
                                            title="Deletar Oferta"
                                            class="btn btn-outline-warning"
                                            style="color: #cc0000">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/sweetalert.min.js')}}"></script>
    <script>
        $(function () {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //==================================================================================================================
            //AO MUDAR O SELECT DAS OPÇÃO DO CARDAPIO ELE BUSCA AS REFEIÇÃO RELACIONADAS A ELE
            $("#opc_cardapio").change(function(){
                let id = $(this).val();

                if(id != 0) {
                    $.ajax({
                        url: '{{url('/ofertas/search/')}}' + '/' + id,
                        type: 'get',
                        success: function (data) {
                            if(data.refeicao.length > 0){
                                $('#opc_ref').empty();

                                $.each(data.refeicao, function(index, ref){
                                    $('#opc_ref').append(`<option value="` + ref.id_cardapio + `">` + ref.nm_cardapio + `</option>`);
                                });
                            }
                        }
                    });
                }
                else{
                    $('#opc_ref').empty().append(`<option value="0"></option>`);
                }
            });

            //==================================================================================================================
            //BOTÃO PARA EXCLUIR A REFEIÇÃO
            $('button#btn_excluir').click(function(){
                let id = $(this).val();
                let campoTR = $(this).parent().parent();
                let token = $("input[name='_token']").val();

                swal({
                    title: "Você tem certeza que deseja deletar ?",
                    text: "Uma vez deletada, você não terá mais acesso a essa oferta.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((vaiApagar) => {
                        if(vaiApagar){

                            $.ajax({
                                url: '{{url('delete/ofertas/')}}/' + id,
                                type: 'post',
                                data: {_token: token},
                                success: function(data){
                                    if(data.deuErro === false){
                                        campoTR.fadeOut(500, function () {
                                            $(this).remove();

                                            swal("Oferta deletada com sucesso!", {
                                                icon: "success",
                                            });
                                        });
                                    }
                                    else{
                                        swal("Erro ao deletar a oferta.", {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        }
                    });
            });

        });
    </script>
@stop