<?php

namespace App\Http\Controllers;

use App\Bebida;
use App\Refeicao;
use App\Sobremesa;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function indexCardapio(){
        $refeicao = Refeicao::join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
            ->get();

        return view('pages.app.indexCardapio', compact('refeicao'));
    }

    public function indexProdutos(){
        $refeicao = Refeicao::paginate(3);

        return view('pages.app.indexProdutos', compact('refeicao'));
    }

    public function indexReserva(){
        return view('pages.app.indexReserva');
    }

    public function indexDetalhes($slug){
        $item = Refeicao::where('slug_cardapio', '=', $slug)->get();

        return view('pages.app.details', compact('item'));
    }

    public function indexLoginRegister(){
        return view('pages.app.indexLoginRegister');
    }
}
