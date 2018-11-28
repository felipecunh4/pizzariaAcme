<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProdutosController@indexApp')->name('index');
Route::get('/register', 'CardapioController@indexLoginRegister')->name('index.login.register');
Route::get('/cardapio', 'CardapioController@indexCardapio')->name('index.cardapio');
Route::get('/produtos', 'CardapioController@indexProdutos')->name('index.produtos');
Route::get('/reservas', 'CardapioController@indexReserva')->name('index.reserva');
Route::get('/detalhes/{slug}', 'CardapioController@indexDetalhes')->name('index.detalhes');

//=====================================================================================================================
//REFEIÇÕES
Route::get('/cadastrar/refeicao', 'RefeicaoController@indexRefeicao')->name('index.admin.refeicao');
Route::get('/cadastrar/bebidas', 'RefeicaoController@indexBebida')->name('index.admin.bebidas');
Route::get('/cadastrar/sobremesa', 'RefeicaoController@indexSobremesa')->name('index.admin.sobremesa');
Route::post('/save/refeicao', 'RefeicaoController@saveRefeicao')->name('save.refeicao');
Route::post('/delete/refeicao/{id}', 'RefeicaoController@deleteRefeicao')->name('delete.refeicao');
Route::post('/update/refeicao', 'RefeicaoController@atualizaRefeicao')->name('update.refeicao');

//=====================================================================================================================
//CLIENTES
Route::post('/cliente/save', 'ClienteController@saveCliente')->name('save.cliente');
