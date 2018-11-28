@extends('layouts.app.app')

@section('content')

    <section class="full_screen_hero">
        <div class="display-table">
            <div class="verticle-middle">
                <div class="container text-center">
                    <h1>Ricardo Restaurante</h1>
                    <p class="lead">O boteco ideal para sua noite</p>
                </div>
            </div>
        </div>
    </section>
    <!--static parallax end-->


    {{--<div class="space-70"></div>
    <div class="overflow-hidden">
        <div class="container">
            <div class="row vertical-align-child">
                <div class="col-md-6 text-center">
                    <h1 class="title-1">Welcome to <span class="text-color ">resto</span></h1>
                    <h5 class="subtitle">Our Little Story</h5>
                    <div class="space-30"></div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean <span class="text-color">commodo</span> ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                    </p>
                    <blockquote>
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.

                    </blockquote>
                    <img src="{{asset('img/sign.png')}}" alt="">
                    <div class="space-30"></div>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('img/combine1.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="space-70"></div>
    <div class="cta-background parallax-background" >
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-left">
                    <p class="lead ">
                        " Cooking everything with respect will lead to amazing tasting experiences "
                    </p>
                    <span class="lead">Rolf Baumann</span>
                </div>
            </div>
        </div>
    </div><!--end call to action-->--}}
    <div class="space-70"></div>

    <div class="container">
        <div class="text-center">
            <h1 class="title-1">Ofertas <span class="text-color ">do Dia</span></h1>
            <h5 class="subtitle">Ofertas</h5>
            <div class="space-30"></div>
        </div>
        <div class="row vertical-align-child">
            <div class="col-md-6">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav menu-tabs margin-b-30" role="tablist">
                        <li role="presentation" class="nav-item"><a class="active nav-link" href="#refeicao" aria-controls="drink" role="tab" data-toggle="tab">Refeições</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#bebida" aria-controls="lunch" role="tab" data-toggle="tab">Bebidas</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="#sobremesa" aria-controls="dinner" role="tab" data-toggle="tab">Sobremesas</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active show fade" id="refeicao">
                            <ul class="list-unstyled">
                                @foreach($ofertasRef as $o)
                                    <li class="menu-box clearfix margin-b-20">
                                        <div class="thumb">
                                            <img src="{{asset('img/pizzas/' . $o->img_cardapio)}}" width="70" class="img-fluid" alt="{{$o->nm_cardapio}}">
                                        </div>
                                        <div class="menu-content">
                                            <h4><a href="{{route('index.detalhes', $o->slug_cardapio)}}">{{$o->nm_cardapio}}</a> <span>R$ {{$o->vl_oferta}}</span></h4>
                                            <p>{{$o->desc_cardapio}}</p>
                                        </div>
                                    </li><!--end menu box-->
                                @endforeach
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="bebida">
                            <ul class="list-unstyled">
                                @foreach($ofertasBeb as $o)
                                    <li class="menu-box clearfix margin-b-20">
                                        <div class="thumb">
                                            <img src="{{asset('img/pizzas/' . $o->img_cardapio)}}" width="70" class="img-fluid" alt="{{$o->nm_cardapio}}">
                                        </div>
                                        <div class="menu-content">
                                            <h4><a href="{{route('index.detalhes', $o->slug_cardapio)}}">{{$o->nm_cardapio}}</a> <span>R$ {{$o->vl_oferta}}</span></h4>
                                            <p>{{$o->desc_cardapio}}</p>
                                        </div>
                                    </li><!--end menu box-->
                                @endforeach
                            </ul>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="sobremesa">
                            <ul class="list-unstyled">
                                @foreach($ofertasSob as $o)
                                    <li class="menu-box clearfix margin-b-20">
                                        <div class="thumb">
                                            <img src="{{asset('img/pizzas/' . $o->img_cardapio)}}" width="70" class="img-fluid" alt="{{$o->nm_cardapio}}">
                                        </div>
                                        <div class="menu-content">
                                            <h4><a href="{{route('index.detalhes', $o->slug_cardapio)}}">{{$o->nm_cardapio}}</a> <span>R$ {{$o->vl_oferta}}</span></h4>
                                            <p>{{$o->desc_cardapio}}</p>
                                        </div>
                                    </li><!--end menu box-->
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div><!--end tabs-->
            </div>
            <div class="col-md-6 text-center">

                <div class="abso-img">
                    <a href="{{route('index.produtos')}}" class="btn btn-dark btn-xl">Ver Cardápio Completo</a>
                    <img src="{{asset('img/m1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="space-70"></div>
    {{--<div class="about-chefs">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <h1 class="text-uppercase"> award winning chefs </h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                    </p>
                </div>

            </div>
        </div>
    </div><!--about chef cta-->
    <div class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div class="text-center">
                        <h1 class="title-1">Customer <span class="text-color ">Reviews</span></h1>
                        <h5 class="subtitle">What they say</h5>
                        <div class="space-30"></div>
                    </div>
                    <div class="testi-slider">
                        <ul class="slides">
                            <li>
                                <p>
                                    Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.
                                </p>

                                <div class="testi-info">
                                    <img src="{{asset('img/avtar-1.jpg')}}" alt="" width="50" class="img-circle">
                                    <h4>John Doe <small> - Resto customer</small></h4>

                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-ios-star-half"></i>
                                </div>
                            </li><!--slide item-->
                            <li>
                                <p>
                                    Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.
                                </p>

                                <div class="testi-info">
                                    <img src="{{asset('img/avtar-2.jpg')}}" alt="" width="50" class="img-circle">
                                    <h4>John Doe <small> - Resto customer</small></h4>

                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-ios-star-half"></i>
                                </div>
                            </li><!--slide item-->
                            <li>
                                <p>
                                    Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.
                                </p>

                                <div class="testi-info">
                                    <img src="{{asset('img/avtar-3.jpg')}}" alt="" width="50" class="img-circle">
                                    <h4>John Doe <small> - Resto customer</small></h4>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-star"></i>
                                    <i class="ion-ios-star-half"></i>
                                </div>
                            </li><!--slide item-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--testimonials end-->--}}

    <div class="cta-background-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h1 class="text-uppercase">Reserve uma mesa agora</h1>
                    <p>
                        Localize e reserve uma mesa e receba uma confirmação imediata da sua reserva!
                    </p>
                    <a href="{{route('index.reserva')}}" class="btn btn-white btn-rounded">Faça a reserva</a>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-skin contact-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 margin-b-30">
                    <i class="ion-email"></i>
                    <div class="overflow-hidden">
                        <h4>Email</h4>
                        <p class="lead">
                            yourmail@dmain.com
                        </p>
                    </div>
                </div>
                <div class="col-md-4 margin-b-30">
                    <i class="ion-ios-telephone"></i>
                    <div class="overflow-hidden">
                        <h4>Reservas</h4>
                        <p class="lead">
                            +01 123-456-4590
                        </p>
                    </div>
                </div>
                <div class="col-md-4 margin-b-30">
                    <i class="ion-map"></i>
                    <div class="overflow-hidden">
                        <h4>Localização</h4>
                        <p class="lead">
                            124, Lorem Street, NY
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop