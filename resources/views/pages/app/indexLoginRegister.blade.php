@extends('layouts.app.app')

@section('content')

    <div class="page-breadcrumb">
        <div class="container text-center">
            <h1>Login & Cadastro</h1>
        </div>
    </div>
    @include('partials.admin._alerts')
    <div class="overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <div class="login-register-left login-register-container">
                        <div class="login-register-inner">
                            <h3 class="margin-b-20 text-uppercase">Login</h3>
                            <form>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha*">
                                </div>
                                <div class="clearfix">
                                    <div class="float-right text-right">
                                        <input type="submit" class="btn btn-primary btn-lg" value="Login">   <br>
                                        <div>
                                            <a href="#">Esqueceu a sua senha ?</a>
                                        </div>
                                    </div>
                                    <div class="float-left">

                                        <div>
                                            <input type="checkbox" name="remember" id="remember">
                                            <label for="remember">Lembrar de mim</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mr-auto">
                    <div class="space-80"></div>
                    <div class="login-register-container">
                        <h3 class="margin-b-20 text-uppercase">Cadastrar</h3>
                        <form method="post" action="{{route('save.cliente')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email*" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha*" name="password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nome*" name="nm_cliente">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Sobrenome*" name="sobrenome_cliente">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="CPF*" name="cpf_cliente">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Data de Nascimento*" name="dt_nasc_cliente">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Celular*" name="cel_cliente">
                            </div>
                            <div class="clearfix">
                                <div class="float-right text-right">
                                    <input type="submit" class="btn btn-dark btn-lg" value="Cadastrar">
                                </div>
                               {{-- <div class="float-left">

                                    <div>
                                        <input type="checkbox" name="agree" id="agree">
                                        <label for="agree">Agree with terms & conditions</label>
                                    </div>
                                </div>--}}
                            </div>
                        </form>
                    </div>
                    <div class="space-80"></div>
                </div>
            </div>
        </div>
    </div>

@stop