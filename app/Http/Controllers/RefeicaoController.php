<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefeicaoRequest;
use App\Refeicao;
use Illuminate\Http\Request;
use Image;

class RefeicaoController extends Controller
{
    public function indexRefeicao(){
        $refeicoes = Refeicao::join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
            ->where('tipo_refeicao.id_tipo_refeicao', '=', 1)->get();

        return view('pages.admin.cadRefeicao', compact('refeicoes'));
    }

    public function indexSobremesa(){
        $sobremesas = Refeicao::join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
                        ->where('tipo_refeicao.id_tipo_refeicao', '=', 3)->get();

        return view('pages.admin.cadSobremesa', compact('sobremesas'));
    }

    public function indexBebida(){
        $bebidas = Refeicao::join('tipo_refeicao', 'tipo_refeicao.id_tipo_refeicao', '=', 'cardapio.fk_tipo_ref')
            ->where('tipo_refeicao.id_tipo_refeicao', '=', 2)->get();

        return view('pages.admin.cadbebidas', compact('bebidas'));
    }

    //==================================================================================================================
    //SALVA A REFEIÇÃO
    public function saveRefeicao(RefeicaoRequest $request){
        //dd($request->all());

        try{
            if($request->hasFile('images')){

                $imageName = $this->createImage($request->images, $request->nm_cardapio);

                $slugname = str_slug($request->nm_cardapio, '-');

                $this->createRefeicao($request->nm_cardapio, $request->desc_cardapio, $request->vl_cardapio, $request->qt_cardapio, $imageName, $slugname, $request->fk_tipo_ref);

            }
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar salvar cardápio.');
            //throw $e;
        }

        return redirect()->back()->with('success', 'Cardápio salvo com sucesso.');
    }

    public function createImage($imagem, $nm_ref){
        $image = $imagem;
        $imagePath = public_path('img/pizzas');

        $ext = $image[0]->getClientOriginalExtension();

        $tituloImagem = str_replace(" ", "", $nm_ref);
        $imageName = $tituloImagem . '.' . $ext;

        $realPath = $image[0]->getRealPath();

        $this->saveImageFile($imagePath, $imageName, $realPath);

        return $imageName;
    }

    //==================================================================================================================
    //SALVA O ARQUIVO DA IMAGEM
    public function saveImageFile($imagePath, $imageName, $realPath)
    {
        Image::make($realPath)->save($imagePath . '/' . $imageName);
    }

    //==================================================================================================================
    //CRIA A REFEIÇÃO
    public function createRefeicao($nome, $desc, $valor, $qtd, $img, $slug, $fk)
    {
        //dd($nome, $desc, $valor, $qtd, $img, $slug, $fk);
        return Refeicao::firstOrCreate([
            'nm_cardapio' => $nome,
            'desc_cardapio' => $desc,
            'vl_cardapio' => str_replace(",", ".", $valor),
            'qt_cardapio' => $qtd,
            'img_cardapio' => $img,
            'slug_cardapio' => $slug,
            'fk_tipo_ref' => $fk
        ]);
    }

    //==================================================================================================================
    //DELETA A REFEIÇÃO
    public function deleteRefeicao($id){
        try{
            $ref = Refeicao::find($id);
            $this->deleteImageFile($ref->img_cardapio);
            $ref->delete();
        }
        catch (\Exception $e){
            return response()->json(['deuErro' => true]);
        }

        return response()->json(['deuErro' => false]);
    }

    //==================================================================================================================
    //DELETA A IMAGEM
    public function deleteImageFile($caminhoImagem)
    {
        $rootProductsPath = public_path('img/pizzas/');

        unlink($rootProductsPath . $caminhoImagem);
    }

    //==================================================================================================================
    //ATUALIZA A REFEIÇÃO
    public function atualizaRefeicao(Request $request){
        //dd($request->all());
        try{
            $ref = Refeicao::find($request->id_cardapio);
            //dd($ref);
            $ref->nm_cardapio = $request->nm_cardapio;
            $ref->qt_cardapio = $request->qt_cardapio;
            $ref->vl_cardapio = str_replace(",", ".", $request->vl_cardapio);
            $ref->desc_cardapio = $request->desc_cardapio;
            $slugname = str_slug($request->nm_cardapio, '-');
            $ref->slug_cardapio = $slugname;

            if($request->hasFile('images')){
                $this->deleteImageFile($ref->img_cardapio);
                $imageName = $this->createImage($request->images, $request->nm_cardapio);
                $ref->img_cardapio= $imageName;
            }

            $ref->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar atualizar cardápio.');
        }

        return redirect()->back()->with('success', 'Cardápio atualizado com sucesso.');
    }
}
