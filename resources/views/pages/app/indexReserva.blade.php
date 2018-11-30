@extends('layouts.app.app')

@section('content')

    <div class="page-breadcrumb">
        <div class="container text-center">
            <h1>Faça uma Reserva</h1>
        </div>
    </div>
    <!--==============end page header============-->
    <div class="space-80"></div>
    @include('partials.admin._alerts')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ml-auto mr-auto">
                <div class="margin-b-40">
                    <h2 class="text-uppercase text-center">Agende seu Horário</h2>
                    <p>Sempre que realizar sua reserva, indique o horário desejado que você chegará no bar.</p>
                    <p>
                        Aguarde a disponibilidade de mesa e confirmação do horário da reserva por e-mail ou telefone.
                        Toda reserva confirmada tem uma tolerância de 15 minutos. Após esse tempo a mesa será liberada automaticamente para outros clientes.
                    </p>
                    <p>
                        O agendamento de reservas para o mesmo dia através do site encerra-se às 17h. Após esse horário você deve ligar direto no bar através dos telefones disponíveis nas páginas de cada unidade.
                        Observe atentamente ao horário de funcionamento do bar no momento de realizar sua ligação para verificar se o bar está aberto.
                    </p>
                </div>

                <form id="" method="post" class="reservation-form" action="{{route('save.reserva')}}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group date">
                                <input type="text" class="form-control datepicker" name="dia_reserva" required placeholder="Data">
                                <div class="input-group-addon">
                                    <span class="ion-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text"  id="r_name" class="form-control " name="nm_cliente" required maxlength="75" placeholder="Nome Completo">
                                <div class="input-group-addon">
                                    <span class="ion-person"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" id="r_email" class="form-control" name="email" required maxlength="120" placeholder="Email">
                                <div class="input-group-addon">
                                    <span class="ion-ios-email"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group clockpicker">
                                <input type="text" id="r_time" class="form-control" name="hora_reserva" value="22:30" required placeholder="Horario">
                                <span class="input-group-addon">
                                        <span class="ion-ios-clock"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="number" id="r_guest" class="form-control" name="qtd_pessoas" required min="1" max="8" placeholder="Número de Pessoas">
                                <div class="input-group-addon">
                                    <span class="ion-person"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" id="r_phone_number" class="form-control sp_celphones" name="tel_contato" maxlength="15" required placeholder="Telefone">
                                <div class="input-group-addon">
                                    <span class="ion-android-call"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-xl btn-dark btn-block">Agendar</button>
                    {{--<input type="submit" class="btn btn-xl btn-dark btn-block" name="r_submit" value="Agendar">--}}
                    {{--<div id="r_result"></div>--}}
                </form>

            </div>
        </div>
    </div>



    <div class="space-80"></div>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script>
        $(function() {
            let SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.sp_celphones').mask(SPMaskBehavior, spOptions);

        });
    </script>
@stop