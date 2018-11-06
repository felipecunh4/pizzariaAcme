<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@indexApp')->name('index');
Route::get('/cardapio', 'CardapioController@indexCardapio')->name('index.cardapio');
Route::get('/produtos', 'CardapioController@indexProdutos')->name('index.produtos');
Route::get('/reservas', 'CardapioController@indexReserva')->name('index.reserva');

Route::get('/cadbebidas', 'HomeController@cadbebidas')->name('cadbebidas');
