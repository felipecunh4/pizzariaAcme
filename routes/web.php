<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProdutosController@indexApp')->name('index');
Route::get('/cardapio', 'CardapioController@indexCardapio')->name('index.cardapio');
Route::get('/produtos', 'CardapioController@indexProdutos')->name('index.produtos');
Route::get('/reservas', 'CardapioController@indexReserva')->name('index.reserva');
Route::get('/detalhes/{slug}', 'CardapioController@indexDetalhes')->name('index.detalhes');

//=====================================================================================================================
//REFEIÇÕES
Route::get('/cadastrar/refeicao', 'RefeicaoController@indexRefeicao')->name('index.admin.refeicao');
Route::post('/save/refeicao', 'RefeicaoController@saveRefeicao')->name('save.refeicao');
Route::post('/delete/refeicao/{id}', 'RefeicaoController@deleteRefeicao')->name('delete.refeicao');
Route::post('/update/refeicao', 'RefeicaoController@atualizaRefeicao')->name('update.refeicao');

//=====================================================================================================================
//BEBIDAS
Route::get('/cadastrar/bebidas', 'BebidaController@indexBebida')->name('index.admin.bebidas');
Route::post('/save/bebida', 'BebidaController@saveBebida')->name('save.bebida');
Route::post('/delete/bebida/{id}', 'BebidaController@deleteBebida')->name('delete.bebida');
Route::post('/update/bebida', 'BebidaController@atualizaBebida')->name('update.bebida');

//=====================================================================================================================
//BEBIDAS
Route::get('/cadastrar/sobremesa', 'SobremesaController@indexSobremesa')->name('index.admin.sobremesa');
Route::post('/save/sobremesa', 'SobremesaController@saveSobremesa')->name('save.sobremesa');
Route::post('/delete/sobremesa/{id}', 'SobremesaController@deleteSobremesa')->name('delete.sobremesa');
Route::post('/update/sobremesa', 'SobremesaController@atualizaSobremesa')->name('update.sobremesa');