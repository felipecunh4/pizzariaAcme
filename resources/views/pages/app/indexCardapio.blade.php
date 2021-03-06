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
            <h1>Cardápio</h1>
        </div>
    </div>
    <!--==============end page header============-->
    <div class="space-80"></div>


    <div class="container">
        <ul class="menu-filter-list list-inline margin-b-40 text-center">
            <li class="is-checked" data-filter="*">Tudo</li>
            <li data-filter=".refeicao">Pizzas</li>
            <li data-filter=".bebidas">Bebidas</li>
            <li data-filter=".sobremesas">Sobremesas</li>
        </ul>

        <div class="row menu-filter-items">

            @foreach($refeicao as $r)
                @if($r->id_tipo_refeicao == 1)
                    <div class=" refeicao col-md-4 margin-b-30 menu-item">
                @elseif($r->id_tipo_refeicao == 2)
                    <div class=" bebidas col-md-4 margin-b-30 menu-item">
                @else
                    <div class=" sobremesas col-md-4 margin-b-30 menu-item">
                @endif
                    <a href="{{route('index.detalhes', $r->slug_cardapio)}}" class="menu-grid">
                        <img src="{{asset('img/pizzas/' . $r->img_cardapio)}}" alt="{{$r->nm_cardapio}}" class="tamanhoimg img-fluid">
                        <div class="menu-grid-desc">
                            @if($r->fk_id_dia == ($dia_semana + 1))
                                <span class="price float-right">R$ {{$r->vl_oferta}}</span>
                            @else
                                <span class="price float-right">R$ {{$r->vl_cardapio}}</span>
                            @endif
                            <h4>{{$r->nm_cardapio}}</h4>
                            <p>
                                {{$r->desc_cardapio}}
                            </p>
                        </div>
                    </a>
                </div><!--end col-->
            @endforeach

        </div>
    </div>

@stop