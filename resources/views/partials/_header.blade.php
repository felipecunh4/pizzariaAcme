<div id="preloader">
    <div id="preloader-inner"></div>
</div>
<!--/preloader-->

<header class="header header-top-transparent">
    <!--top bar-->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 hidden-sm-down">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="ion-ios-telephone"></i> +01 1800 495 593</a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="ion-email"></i> support@resto.com</a></li>
                    </ul>
                </div>
                {{--<div class="col-sm-6 text-right">
                    <ul class="list-inline level-2">
                        <li class="b-table list-inline-item"><a href="#" class=" waves-float waves-button">Book a table</a></li>
                        --}}{{--<li class="lang list-inline-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Lang </i></a>
                            <ul class="dropdown-menu lang-dropdown">
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/spanish.png" alt="Spanish">Spanish</a></li>
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/italy.png" alt="Italian">Italian</a></li>
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/german.png" alt="German">German</a></li>
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/fr.png" alt="French">French</a></li>
                                <li><a href="javascript:void(0)"><span><img class="flag" src="assets/images/usa-flag.png" alt="English">English</span></a></li>
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/jp.png" alt="Japanise">Japanise</a></li>
                                <li><a href="javascript:void(0)"><img class="flag" src="assets/images/in.png" alt="Hindi">Hindi</a></li>
                            </ul>
                        </li>--}}{{--
                    </ul>
                </div>--}}
            </div>
        </div>
    </div>
    <!--end top bar-->
    <!--main navigation-->
    <nav class="navbar navbar-light navbar-expand-lg navbar-static-top sticky-header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right collapsed" data-toggle="collapse" data-target="#navbarNavDropdown" aria-expanded="false" aria-controls="navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="{{route('index')}}">

                    <img src="{{asset('img/logo-light.png')}}" alt="logo" class="logo-default">
                    <img src="{{asset('img/logo-dark.png')}}" alt="logo" class="logo-scroll">

                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{route('index')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('index.cardapio')}}" class="nav-link">Cardápio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index.reserva')}}">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index.produtos')}}">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index.login.register')}}">Login</a></li>
                </ul>
            </div><!--/.nav-collapse -->
            <!--cart icon-->
            <div class="float-right cart-nav nav-item">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="ion-ios-cart"></i> <span class="badge badge-primary">3</span></a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-cart">
                        <li>
                            <ul class="list-unstyled">
                                <li class="clearfix">
                                    <a href="#" class="float-left">
                                        <img src="{{asset('img/img-2.jpg')}}" class="img-fluid" alt="" width="60">
                                    </a>
                                    <div class="oHidden">
                                        <span class="close"><i class="ion-ios-close-outline"></i></span>
                                        <h4><a href="#">Product Title</a></h4>
                                        <p class="text-white-gray"><strong>$299.00</strong> x 1</p>
                                    </div>
                                </li><!--/cart item-->
                                <li class="clearfix">
                                    <a href="#" class="float-left">
                                        <img src="{{asset('img/img-1.jpg')}}" class="img-fluid" alt="" width="60">
                                    </a>
                                    <div class="oHidden">
                                        <span class="close"><i class="ion-ios-close-outline"></i></span>
                                        <h4><a href="#">Product Title</a></h4>
                                        <p class="text-white-gray"><strong>$99.00</strong> x 1</p>
                                    </div>
                                </li><!--/cart item-->
                                <li class="clearfix">
                                    <a href="#" class="float-left">
                                        <img src="{{asset('img/img-3.jpg')}}" class="img-fluid" alt="" width="60">
                                    </a>
                                    <div class="oHidden">
                                        <span class="close"><i class="ion-ios-close-outline"></i></span>
                                        <h4><a href="#">Product Title</a></h4>
                                        <p class="text-white-gray"><strong>$199.00</strong> x 1</p>
                                    </div>
                                </li><!--/cart item-->
                                <li class="clearfix">

                                    <div class="float-right">
                                        <a href="#" class="btn btn-primary">Checkout</a>
                                    </div>
                                    <h4>
                                        <small>Subtotal - </small> $49.99
                                    </h4>
                                </li><!--/cart item-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--/.container-fluid -->
    </nav>
</header>