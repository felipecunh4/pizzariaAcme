@extends('layouts.app.app')

@section('content')

    <style>
        .tamanhoimg {

            width: 350px;
            height: 255px;
            background-size: 100% 100%;
            -webkit-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            -khtml-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
        }

        .box span {
            position: absolute !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
        }
    </style>

    <div class="page-breadcrumb">
        <div class="container text-center">
            <h1>Nossos Produtos</h1>
        </div>
    </div>
    <!--==============end page header============-->
    <div class="space-80"></div>
    <div class="container">
        <div class="row">
            @foreach($refeicao as $r)
                <div class="col-md-4 margin-b-30">
                    <div class="product-box">
                        <div class="product-thumb">
                            <img src="{{asset('img/pizzas/' . $r->img_cardapio)}}" alt="{{$r->nm_cardapio}}" class="tamanhoimg img-fluid">
                            <a href="{{route('index.detalhes', $r->slug_cardapio)}}" class="item-link"></a>
                            <div class="product-item-tools">
                                <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lista de Desejos">
                                    <i class="ion-ios-heart"></i>
                                </a>
                                <a href="#" class="btn btn-primary">
                                    Adicionar ao Carrinho
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <h4><a href="#">{{$r->nm_cardapio}}</a></h4>
                            @if($r->fk_id_dia == ($dia_semana + 1))
                                <span>R$ {{$r->vl_oferta}}</span>
                            @else
                                <span>R$ {{$r->vl_cardapio}}</span>
                            @endif
                        </div>
                    </div><!--product box end-->
                </div><!--col end-->
            @endforeach
        </div>

        <nav aria-label="Page navigation example" class="clearfix">
            <ul class="pagination float-right">
                {{$refeicao->links()}}
            </ul>
        </nav>
    </div>

    <div class="space-50"></div>

@stop