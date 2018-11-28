<?php

namespace App\Http\Controllers;

use App\Ofertas;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function indexApp(){

        $data = date('Y-m-d');
        $dia_semana = date('w', strtotime($data));

        $ofertasRef = Ofertas::join('dias_semana', 'dias_semana.id_dia', '=', 'ofertas.fk_id_dia')
            ->join('cardapio', 'cardapio.id_cardapio', '=', 'ofertas.fk_id_cardapio')
            ->where('ofertas.fk_id_dia', '=', ($dia_semana + 1))
            ->where('cardapio.fk_tipo_ref', '=', 1)
            ->get();

        $ofertasBeb = Ofertas::join('dias_semana', 'dias_semana.id_dia', '=', 'ofertas.fk_id_dia')
            ->join('cardapio', 'cardapio.id_cardapio', '=', 'ofertas.fk_id_cardapio')
            ->where('ofertas.fk_id_dia', '=', ($dia_semana + 1))
            ->where('cardapio.fk_tipo_ref', '=', 2)
            ->get();

        $ofertasSob = Ofertas::join('dias_semana', 'dias_semana.id_dia', '=', 'ofertas.fk_id_dia')
            ->join('cardapio', 'cardapio.id_cardapio', '=', 'ofertas.fk_id_cardapio')
            ->where('ofertas.fk_id_dia', '=', ($dia_semana + 1))
            ->where('cardapio.fk_tipo_ref', '=', 3)
            ->get();

        return view('pages.app.index', compact('ofertasRef', 'ofertasBeb', 'ofertasSob'));
    }
}
