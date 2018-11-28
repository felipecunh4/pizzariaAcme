<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfertaRequest;
use App\Ofertas;
use App\Refeicao;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function indexOferta(){
        $ofertas = Ofertas::join('dias_semana', 'dias_semana.id_dia', '=', 'ofertas.fk_id_dia')
                    ->join('cardapio', 'cardapio.id_cardapio', '=', 'ofertas.fk_id_cardapio')
                    ->get();

        return view('pages.admin.ofertas', compact('ofertas'));
    }

    public function buscaRefeicao($id){
        $refeicao = Refeicao::join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
            ->where('tipo_refeicao.id_tipo_refeicao', '=', $id)->get();

        return response()->json(['refeicao' => $refeicao]);
    }

    public function saveOferta(OfertaRequest $request){
        //dd($request->all());

        $ofertas = Ofertas::join('dias_semana', 'dias_semana.id_dia', '=', 'ofertas.fk_id_dia')
                    ->where('ofertas.fk_id_dia', '=', $request->fk_id_dia)
                    ->get();

        if(count($ofertas) >= 5)
            return redirect()->back()->with('nosuccess', 'Limite de 5 ofertas por dia.');

        try{
            Ofertas::create([
                'fk_id_cardapio' => $request->fk_id_cardapio,
                'vl_oferta' => str_replace(",", ".", $request->vl_oferta),
                'fk_id_dia' => $request->fk_id_dia,
            ]);
        }
        catch (\Exception $e){
            //throw $e;
            return redirect()->back()->with('nosuccess', 'Erro ao cadastrar oferta.');
        }


        return redirect()->back()->with('success', 'Oferta cadastrada com sucesso.');
    }

    public function deleteOferta($id){

        try{
            $oferta = Ofertas::find($id);
            $oferta->delete();
        }
        catch (\Exception $e){
            return response()->json(['deuErro' => true]);
        }

        return response()->json(['deuErro' => false]);
    }
}
