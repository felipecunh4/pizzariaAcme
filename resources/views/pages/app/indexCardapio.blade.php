@extends('layouts.app.app')

@section('content')

    <div class="page-breadcrumb">
        <div class="container text-center">
            <h1>Cardápio</h1>
        </div>
    </div>
    <!--==============end page header============-->
    <div class="space-80"></div>


    <div class="container">
        <ul class="menu-filter-list list-inline margin-b-40 text-center">
            <li class="is-checked" data-filter="*">All</li>
            <li data-filter=".refeicao">Pizzas</li>
            <li data-filter=".bebidas">Bebidas</li>
            <li data-filter=".sobremesas">Sobremesas</li>
        </ul>

        <div class="row menu-filter-items">

            @foreach($refeicao as $r)
                <div class=" refeicao col-md-4 margin-b-30 menu-item">
                    <a href="{{route('index.detalhes', $r->slug_refeicao)}}" class="menu-grid">
                        <img src="{{asset('img/pizzas/' . $r->img_refeicao)}}" alt="{{$r->nm_refeicao}}" class="img-fluid">
                        <div class="menu-grid-desc">
                            <span class="price float-right">R$ {{$r->vl_refeicao}}</span>
                            <h4>{{$r->nm_refeicao}}</h4>
                            <p>
                                {{$r->desc_refeicao}}
                            </p>
                        </div>
                    </a>
                </div><!--end col-->
            @endforeach

            @foreach($bebidas as $b)
                <div class=" bebidas col-md-4 margin-b-30 menu-item">
                    <a href="{{route('index.detalhes', $b->slug_bebida)}}" class="menu-grid">
                        <img src="{{asset('img/bebidas/' . $b->img_bebida)}}" alt="{{$b->nm_bebida}}" class="img-fluid">
                        <div class="menu-grid-desc">
                            <span class="price float-right">R$ {{$b->vl_bebida}}</span>
                            <h4>{{$b->nm_bebida}}</h4>
                            <p>
                                {{$b->desc_bebida}}
                            </p>
                        </div>
                    </a>
                </div><!--end col-->
            @endforeach

                @foreach($sobremesas as $sm)
                    <div class=" sobremesas col-md-4 margin-b-30 menu-item">
                        <a href="{{route('index.detalhes', $sm->slug_sobremesa)}}" class="menu-grid">
                            <img src="{{asset('img/sobremesas/' . $sm->img_sobremesa)}}" alt="{{$sm->nm_sobremesa}}" class="img-fluid">
                            <div class="menu-grid-desc">
                                <span class="price float-right">R$ {{$sm->vl_sobremesa}}</span>
                                <h4>{{$sm->nm_sobremesa}}</h4>
                                <p>
                                    {{$sm->desc_sobremesa}}
                                </p>
                            </div>
                        </a>
                    </div><!--end col-->
                @endforeach

        </div>
    </div>

@stop