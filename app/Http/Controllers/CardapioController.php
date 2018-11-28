<?php

namespace App\Http\Controllers;

use App\Bebida;
use App\Refeicao;
use App\Sobremesa;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function indexCardapio(){
        $refeicao = Refeicao::leftJoin('ofertas', 'ofertas.fk_id_cardapio', '=', 'cardapio.id_cardapio')
            ->join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
            ->orderBy('cardapio.id_cardapio')
            ->get();

        return view('pages.app.indexCardapio', compact('refeicao'));
    }

    public function indexProdutos(){
        $refeicao = Refeicao::leftJoin('ofertas', 'ofertas.fk_id_cardapio', '=', 'cardapio.id_cardapio')
                    ->orderBy('cardapio.id_cardapio')
                    ->paginate(6);

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
