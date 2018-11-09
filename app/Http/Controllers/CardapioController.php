<?php

namespace App\Http\Controllers;

use App\Refeicao;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    //

    public function indexCardapio(){
        $refeicao = Refeicao::all();

        return view('pages.app.indexCardapio', compact('refeicao'));
    }

    public function indexProdutos(){
        return view('pages.app.indexProdutos');
    }

    public function indexReserva(){
        return view('pages.app.indexReserva');
    }
}
