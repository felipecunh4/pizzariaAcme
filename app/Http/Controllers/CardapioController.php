<?php

namespace App\Http\Controllers;

use App\Bebida;
use App\Refeicao;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    //

    public function indexCardapio(){
        $refeicao = Refeicao::all();
        $bebidas = Bebida::all();

        return view('pages.app.indexCardapio', compact('refeicao', 'bebidas'));
    }

    public function indexProdutos(){
        return view('pages.app.indexProdutos');
    }

    public function indexReserva(){
        return view('pages.app.indexReserva');
    }

    public function indexDetalhes(){
        return view('pages.app.details');
    }
}
