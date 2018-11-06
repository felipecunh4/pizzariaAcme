<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    //

    public function indexCardapio(){
        return view('pages.app.indexCardapio');
    }

    public function indexProdutos(){
        return view('pages.app.indexProdutos');
    }

    public function indexReserva(){
        return view('pages.app.indexReserva');
    }
}
