@extends('adminlte::page')

@section('Cadastro de Bebidas', 'Pizzaria Tech')

<link rel="stylesheet" href="{{asset('css/botao-invisivel.css')}}">

@section('content_header')
    <h1>Bebidas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-plus-square"></i>Cadastrar</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bebidas</a></li>
    </ol>
@stop

@section('content')
    @include('partials.admin._alerts')
    <div class="box">
        <div class="box-header">
            <h4>Cadastrar Bebida</h4>
        </div>
        <div class="box-body">
            <form method="post" action="{{route('save.refeicao')}}"  enctype="multipart/form-data">
                {{csrf_field()}}

                <input hidden type="number" value="2" name="fk_tipo_ref">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nm_bebida">Nome Bebida</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                <input id="nm_bebida" type="text" class="form-control" name="nm_cardapio" maxlength="20">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="qt_bebida">Quantidade</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                <input id="qt_bebida" type="text" class="form-control" name="qt_cardapio">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="vl_bebida">Preço</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input id="vl_bebida" type="text" class="form-control" name="vl_cardapio">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="desc_bebida">Descrição</label>
                            <textarea id="desc_bebida" class="form-control" name="desc_cardapio" style="resize: none;" rows="5" maxlength="80"></textarea>
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
                        <!-- <button id="btn_teste" type="button" class="btn btn-danger pull-left">Teste</button> -->
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="box">
        <div class="box-header">
            <h4>Lista de Bebidas</h4>
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
                        @foreach($bebidas as $b)
                            <tr>
                                <td>{{$b->id_cardapio}}</td>
                                <td>
                                    <img src="{{ URL::asset('img/pizzas/' . $b->img_cardapio) }}"
                                         alt="{{ $b->nm_cardapio}}" style="width: 150px; height: 120px;">
                                </td>
                                <td>{{$b->nm_cardapio}}</td>
                                <td>{{$b->qt_cardapio}}</td>
                                <td>{{$b->vl_cardapio}}</td>
                                <td hidden>{{$b->desc_cardapio}}</td>
                                <td class="pull-right">
                                    <button id="btn_editar" title="Editar Bebida"
                                            class="fa fa-pencil btn btn-outline-warning"
                                            data-toggle="modal" data-target="#modal-default" style="color: #367fa9">
                                    </button>
                                    <button id="btn_excluir"
                                            value="{{$b->id_cardapio}}"
                                            title="Deletar Bebida"
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
    <form method="post" action="{{route('update.refeicao')}}" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Atualizar Bebida</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <input hidden type="number" value="2" name="fk_tipo_ref">
                                <div class="row">
                                    <div class="col-md-3" hidden>
                                        <div class="form-group">
                                            <label for="id_modal">Id Bebida:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                <input id="id_modal" type="number" class="form-control" name="id_cardapio" readonly required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nm_modal">Nome Bebida:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                                                <input id="nm_modal" type="text" class="form-control" name="nm_cardapio" required maxlength="20">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="qt_modal">Quantidade:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                                <input id="qt_modal" type="number" class="form-control" name="qt_cardapio" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vl_modal">Preço:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                                <input id="vl_modal" type="text" class="form-control" name="vl_cardapio" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="desc_modal">Descrição:</label>
                                            <textarea id="desc_modal" class="form-control" name="desc_cardapio" rows="5" style="resize: none;" maxlength="80"></textarea>
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
                let id_bebida = $(this).val();
                let campoTR = $(this).parent().parent();
                let token = $("input[name='_token']").val();

                swal({
                    title: "Você tem certeza que deseja deletar ?",
                    text: "Uma vez deletada, você não terá mais acesso a essa bebida.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((vaiApagar) => {
                        if(vaiApagar){

                            $.ajax({
                                url: '{{url('delete/refeicao/')}}/' + id_bebida,
                                type: 'post',
                                data: {_token: token},
                                success: function(data){
                                    if(data.deuErro === false){
                                        campoTR.fadeOut(500, function () {
                                            $(this).remove();

                                            swal("Bebida deletada com sucesso!", {
                                                icon: "success",
                                            });
                                        });
                                    }
                                    else{
                                        swal("Erro ao deletar a bebida.", {
                                            icon: "error",
                                        });
                                    }
                                }
                            });
                        }
                    });
            });

            /* $('#btn_teste').click(function(){
                //let desc = "Um exeplo de um texto <p> com </p> tags <strong>HTML</strong> <span style='font-size='12''>.</span>";
                let desc = "Blush Ruby Rose HB6106-B04 Contém 1 unidade. Experimente o novo Blush da Ruby Rose! Seu tamanho é essencial para carregar e suas cores deixam suas maçãs do rosto perfeitas! Com alta pigmentação, o Blush Cor 4 Bronze Soft da Ruby Rose possui componentes que proporcionam alta fixação na pele, sua textura é fina e aveludada, com ótima durabilidade. Com ele, o rosto fica corado e harmônico! Aplicação: Após a preparação da pele com Base, Corretivo e Pó, utilize um pincel específico para blush e aplique nas maças do rosto. Espalhe o produto até que adquira a naturalidade desejada. <p style='padding: 0px; margin: 0px 0px 10px; border: none; box-sizing: border-box; color: #666666; font-family: Lato, sans-serif; font-size: medium;'> ";
                console.log(desc);

                let novaDesc = "";
                let tag = false;
                for(let i = 0; i < desc.length; i++){
                    console.log(i + " : " + (i + 1));
                    console.log(desc.substr(i, 1));

                    if(!tag){
                        if(desc.substr(i, 1) == "<")
                            tag = true;
                        else
                            novaDesc = novaDesc + desc.substr(i,1);
                    }
                    else if(desc.substr(i, 1) == ">")
                        tag = false;
                }

                console.log('NOVA DESCRIÇÃO:');
                console.log(novaDesc);
            }); */
        });
    </script>
@stop