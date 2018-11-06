@extends('layouts.app.app')

@section('content')

    <div class="page-breadcrumb">
        <div class="container text-center">
            <h1>Faça uma Reserva</h1>
        </div>
    </div>
    <!--==============end page header============-->
    <div class="space-80"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto">
                <div class="margin-b-40">
                    <h2 class="text-uppercase text-center">Agende seu Horário</h2>
                    <p>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    </p>
                </div>

                <form role="form" method="post" class="reservation-form" id="reservation-form" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group date">
                                <input type="text" class="form-control datepicker" name="r_date" placeholder="Data">
                                <div class="input-group-addon">
                                    <span class="ion-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control " name="r_name" id="r_name" placeholder="Nome Completo">
                                <div class="input-group-addon">
                                    <span class="ion-person"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" name="r_email" id="r_email" placeholder="Email">
                                <div class="input-group-addon">
                                    <span class="ion-ios-email"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control" name="r_time" id="r_time" value="22:30" placeholder="Horario">
                                <span class="input-group-addon">
                                        <span class="ion-ios-clock"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" name="r_guest" id="r_guest" placeholder="Número de Pessoas">
                                <div class="input-group-addon">
                                    <span class="ion-person"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" name="r_phone_number" id="r_phone_number" placeholder="Telefone">
                                <div class="input-group-addon">
                                    <span class="ion-android-call"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-xl btn-dark btn-block" name="r_submit" value="Agendar">
                    <div id="r_result"></div>
                </form>

            </div>
        </div>
    </div>



    <div class="space-80"></div>

@stop