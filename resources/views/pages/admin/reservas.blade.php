@extends('adminlte::page')

@section('Reservas', 'Pizzaria Tech')

<link rel="stylesheet" href="{{asset('css/botao-invisivel.css')}}">

@section('content_header')
    <h1>Reservas</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Reservas</a></li>
    </ol>
@stop

@section('content')
    @include('partials.admin._alerts')

    <div class="box">
        <div class="box-header">
            <h4>Reservas Registradas</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th class="text-center">Data</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Qtd. Pessoas</th>
                            <th class="text-center">Horário</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telefone</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reservas as $r)
                            <tr>
                                <td class="text-center">{{date_create($r->dia_reserva)->format('d-m-Y')}}</td>
                                <td class="text-center">{{$r->nm_cliente}}</td>
                                <td class="text-center">{{$r->qtd_pessoas}}</td>
                                <td class="text-center">{{substr($r->hora_reserva, 0, 5)}}</td>
                                <td class="text-center">{{$r->email}}</td>

                                @if(strlen($r->tel_contato) == 11)
                                    <td class="text-center">{{"(" . substr($r->tel_contato, 0, 2) . ") " . substr($r->tel_contato, 2, 5) . "-" . substr($r->tel_contato,7, 4)}}</td>
                                @else
                                    <td class="text-center">{{"(" . substr($r->tel_contato, 0, 2) . ") " . substr($r->tel_contato, 2, 4) . "-" . substr($r->tel_contato,6, 4)}}</td>
                                @endif

                                <td class="text-center">
                                    <button id="btn_excluir"
                                            value="{{$r->id_reserva}}"
                                            title="Deletar Oferta"
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

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/sweetalert.min.js')}}"></script>
    <script>
        $(function () {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            //==================================================================================================================
            //AO MUDAR O SELECT DAS OPÇÃO DO CARDAPIO ELE BUSCA AS REFEIÇÃO RELACIONADAS A ELE


        });
    </script>
@stop