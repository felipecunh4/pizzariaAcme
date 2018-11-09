@extends('adminlte::page')

@section('Cadastro de Sobremesas', 'Pizzaria Tech')

<link rel="stylesheet" href="{{asset('css/botao-invisivel.css')}}">

@section('content_header')
    <h1>Sobremesas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-plus-square"></i>Cadastrar</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Sobremesa</a></li>
    </ol>
@stop

@section('content')
    @include('partials.admin._alerts')
    <div class="box">
        <div class="box-header">
            <h4>Cadastrar Sobremesa</h4>
        </div>
        <div class="box-body">
            <form method="post" action="{{route('save.sobremesa')}}"  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nm_sobremesa">Nome Sobremesa</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                <input id="nm_sobremesa" type="text" class="form-control" name="nm_sobremesa" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="qt_sobremesa">Quantidade</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input id="qt_sobremesa" type="text" class="form-control" name="qt_sobremesa">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vl_sobremesa">Preço</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input id="vl_sobremesa" type="text" class="form-control" name="vl_sobremesa">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="desc_sobremesa">Descrição</label>
                            <textarea id="desc_sobremesa" class="form-control" name="desc_sobremesa" style="resize: none;" rows="5" maxlength="80"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Imagem</label>
                            <div class="file-loading">
                                <input id="input-41" name="images[]" type="file" accept="image/*">
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
            <h4>Lista de Sobremesas</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sobremesas as $sm)
                            <tr>
                                <td>{{$sm->id_sobremesa}}</td>
                                <td>
                                    <img src="{{ URL::asset('img/sobremesas/' . $sm->img_sobremesa) }}"
                                         alt="{{ $sm->nm_sobremesa}}" style="width: 150px; height: 120px;">
                                </td>
                                <td>{{$sm->nm_sobremesa}}</td>
                                <td>{{$sm->qt_sobremesa}}</td>
                                <td>{{$sm->vl_sobremesa}}</td>
                                <td hidden>{{$sm->desc_sobremesa}}</td>
                                <td class="pull-right">
                                    <button id="btn_editar" title="Editar Sobremesa"
                                            class="fa fa-pencil btn btn-outline-warning"
                                            data-toggle="modal" data-target="#modal-default" style="color: #367fa9">
                                    </button>
                                    <button id="btn_excluir"
                                            value="{{$sm->id_sobremesa}}"
                                            title="Deletar Sobremesa"
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

    <!-- MODAL ATUALIZA BEBIDA -->
    <form method="post" action="{{route('update.sobremesa')}}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Atualizar Sobremesa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-3" hidden>
                                        <div class="form-group">
                                            <label for="id_modal">Id Sobremesa:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                <input id="id_modal" type="number" class="form-control" name="id_sobremesa" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nm_modal">Nome Sobremesa:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                                <input id="nm_modal" type="text" class="form-control" name="nm_sobremesa" required maxlength="20">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="qt_modal">Quantidade:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                                <input id="qt_modal" type="number" class="form-control" name="qt_sobremesa" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vl_modal">Preço:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                                <input id="vl_modal" type="text" class="form-control" name="vl_sobremesa" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc_modal">Descrição:</label>
                                            <textarea id="desc_modal" class="form-control" name="desc_sobremesa" rows="5" style="resize: none;" maxlength="80"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Imagem Atual</label><br>
                                        <img id="imagem_atual_modal" src="" alt="" style="width: 150px; height: 120px;">
                                    </div>

                                    <p>&nbsp;</p>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Atualizar Imagem</label>
                                            <div class="file-loading">
                                                <input id="imagem_modal" name="images[]" type="file" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnSairModal" type="button" class="btn btn-default pull-left" data-dismiss="modal">Sair</button>
                        <button id="btnUpdateProd" type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </form>
    <!-- FIM MODAL BANNER -->

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/sweetalert.min.js')}}"></script>
    <script>
        $(function () {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //==================================================================================================================
            //BOTÃO QUE ABRE MODAL PARA EDIÇÃO DA REFEIÇÃO
            $('button#btn_editar').click(function(){
                let campoTR = $(this).parent().parent();
                let id = campoTR.find('td:first').text();
                let img = campoTR.find('td:eq(1)').find('img');
                let nome = campoTR.find('td:eq(2)').text();
                let qtd = campoTR.find('td:eq(3)').text();
                let valor = campoTR.find('td:eq(4)').text();
                let desc = campoTR.find('td:eq(5)').text();

                $('#id_modal').val(id);
                $('#nm_modal').val(nome);
                $('#qt_modal').val(qtd);
                $('#vl_modal').val(valor);
                $('#desc_modal').val(desc);
                $('#imagem_atual_modal').prop('alt', img.prop('alt')).prop('src', img.prop('src'));
            });

            //==================================================================================================================
            //BOTÃO PARA EXCLUIR A REFEIÇÃO
            $('button#btn_excluir').click(function(){
                let id_sobremesa = $(this).val();
                let campoTR = $(this).parent().parent();
                let token = $("input[name='_token']").val();

                swal({
                    title: "Você tem certeza que deseja deletar ?",
                    text: "Uma vez deletada, você não terá mais acesso a essa sobremesa.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((vaiApagar) => {
                        if(vaiApagar){

                            $.ajax({
                                url: '{{url('delete/sobremesa/')}}/' + id_sobremesa,
                                type: 'post',
                                data: {_token: token},
                                success: function(data){
                                    if(data.deuErro === false){
                                        campoTR.fadeOut(500, function () {
                                            $(this).remove();

                                            swal("Sobremesa deletada com sucesso!", {
                                                icon: "success",
                                            });
                                        });
                                    }
                                    else{
                                        swal("Erro ao deletar a sobremesa.", {
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