<?php

namespace App\Http\Controllers;

use App\Bebida;
use App\Refeicao;
use App\Sobremesa;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    //

    public function indexCardapio(){
        $refeicao = Refeicao::all();
        $bebidas = Bebida::all();
        $sobremesas = Sobremesa::all();

        return view('pages.app.indexCardapio', compact('refeicao', 'bebidas', 'sobremesas'));
    }

    public function indexProdutos(){
        return view('pages.app.indexProdutos');
    }

    public function indexReserva(){
        return view('pages.app.indexReserva');
    }

    public function indexDetalhes($slug){

        $item = Refeicao::where('slug_refeicao', '=', $slug)->get();

        if(count($item) == 0){
            $item = Bebida::where('slug_bebida', '=', $slug)->get();
        }

        return view('pages.app.details', compact('item'));
    }
}
