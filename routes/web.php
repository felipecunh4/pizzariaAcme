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

Route::get('/cadastrar/bebidas', 'HomeController@cadbebidas')->name('cadbebidas');

//=====================================================================================================================
//REFEIÇÕES
Route::get('/cadastrar/refeicao', 'RefeicaoController@indexRefeicao')->name('index.admin.refeicao');
Route::post('/save/refeicao', 'RefeicaoController@saveRefeicao')->name('save.refeicao');
Route::post('/delete/refeicao/{id}', 'RefeicaoController@deleteRefeicao')->name('delete.refeicao');
Route::post('/update/refeicao', 'RefeicaoController@atualizaRefeicao')->name('update.refeicao');
