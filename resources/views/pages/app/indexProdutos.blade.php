@extends('layouts.app.app')

@section('content')

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
                            <img src="{{asset('img/pizzas/' . $r->img_cardapio)}}" alt="{{$r->nm_cardapio}}" class="img-fluid">
                            <a href="{{route('index.detalhes', $r->slug_cardapio)}}" class="item-link"></a>
                            <div class="product-item-tools">
                                <a href="#" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wishlist">
                                    <i class="ion-ios-heart"></i>
                                </a>
                                <a href="#" class="btn btn-primary">
                                    Adicionar ao Carrinho
                                </a>
                            </div>
                        </div>
                        <div class="product-detail">
                            <h4><a href="#">{{$r->nm_cardapio}}</a></h4>
                            <span>R$ {{$r->vl_cardapio}}</span>
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