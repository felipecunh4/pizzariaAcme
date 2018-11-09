<?php

namespace App\Http\Controllers;

use App\Http\Requests\RefeicaoRequest;
use App\Refeicao;
use Illuminate\Http\Request;
use Image;

class RefeicaoController extends Controller
{
    public function indexRefeicao(){
        $refeicoes = Refeicao::all();

        return view('pages.admin.cadRefeicao', compact('refeicoes'));
    }

    //==================================================================================================================
    //SALVA A REFEIÇÃO
    public function saveRefeicao(RefeicaoRequest $request){
        //dd($request->all());

        try{
            if($request->hasFile('images')){

                $imageName = $this->createImage($request->images, $request->nm_refeicao);

                $slugname = str_slug($request->nm_refeicao, '-');

                $this->createRefeicao($request->nm_refeicao, $request->desc_refeicao, $request->vl_refeicao, $request->qt_refeicao, $imageName, $slugname);

            }
        }
        catch (\Exception $e){
            return redirect()->route('index.admin.refeicao')->with('nosuccess', 'Erro ao tentar salvar refeição.');
        }

        return redirect()->route('index.admin.refeicao')->with('success', 'Refeição salva com sucesso.');
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
    public function createRefeicao($nome, $desc, $valor, $qtd, $img, $slug)
    {
        return Refeicao::firstOrCreate([
            'nm_refeicao' => $nome,
            'desc_refeicao' => $desc,
            'vl_refeicao' => str_replace(",", ".", $valor),
            'qt_refeicao' => $qtd,
            'img_refeicao' => $img,
            'slug_refeicao' => $slug
        ]);
    }

    //==================================================================================================================
    //DELETA A REFEIÇÃO
    public function deleteRefeicao($id){
        try{
            $ref = Refeicao::find($id);
            $this->deleteImageFile($ref->img_refeicao);
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
            $ref = Refeicao::find($request->id_refeicao);
            //dd($ref);
            $ref->nm_refeicao = $request->nm_refeicao;
            $ref->qt_refeicao = $request->qt_refeicao;
            $ref->vl_refeicao = str_replace(",", ".", $request->vl_refeicao);
            $ref->desc_refeicao = $request->desc_refeicao;
            $slugname = str_slug($request->nm_refeicao, '-');
            $ref->slug_refeicao = $slugname;

            if($request->hasFile('images')){
                $this->deleteImageFile($ref->img_refeicao);
                $imageName = $this->createImage($request->images, $request->nm_refeicao);
                $ref->img_refeicao = $imageName;
            }

            $ref->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar atualizar refeição.');
        }

        return redirect()->back()->with('success', 'Refeição atualizada com sucesso.');
    }
}
