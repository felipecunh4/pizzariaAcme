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
            <li data-filter=".start">start</li>
            <li data-filter=".breakfast">Breakfast</li>
            <li data-filter=".lunch">Lunch</li>
            <li data-filter=".dinner">Dinner</li>
            <li data-filter=".refeicao">Pizzas</li>
            <li data-filter=".bebidas">Bebidas</li>

        </ul>
        <div class="row menu-filter-items">

            @foreach($refeicao as $r)
                <div class=" refeicao col-md-4 margin-b-30 menu-item">
                    <a href="#" class="menu-grid">
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
                    <a href="#" class="menu-grid">
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

            <div class=" start breakfast col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-1.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$12.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" dinner lunch col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-2.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" start lunch col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-3.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" breakfast lunch col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-4.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" dinner start col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-5.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" breakfast col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-6.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" dinner start col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-7.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" breakfast lunch col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-8.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
            <div class=" start dinner col-md-4 margin-b-30 menu-item">
                <a href="#" class="menu-grid">
                    <img src="{{asset('img/img-9.jpg')}}" alt="" class="img-fluid">
                    <div class="menu-grid-desc">
                        <span class="price float-right">$9.50</span>
                        <h4>Menu title</h4>
                        <p>
                            Mauris malesuada fames Aliquam erat ac ipsum dipiscing Nulla amet elt wisi bulum Integer luctus et.
                        </p>
                    </div>
                </a>
            </div><!--end col-->
        </div>
    </div>

@stop