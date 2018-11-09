<?php

namespace App\Http\Controllers;

use App\Bebida;
use App\Http\Requests\BebidaRequest;
use Illuminate\Http\Request;
use Image;

class BebidaController extends Controller
{
    public function indexBebida(){
        $bebidas = Bebida::all();

        return view('pages.admin.cadbebidas', compact('bebidas'));
    }

    //==================================================================================================================
    //SALVA A REFEIÇÃO
    public function saveBebida(BebidaRequest $request){
        //dd($request->all());

        try{
            if($request->hasFile('images')){

                $imageName = $this->createImage($request->images, $request->nm_bebida);

                $slugname = str_slug($request->nm_bebida, '-');

                $this->createBebida($request->nm_bebida, $request->desc_bebida, $request->vl_bebida, $request->qt_bebida, $imageName, $slugname);

            }
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar salvar bebida.');
        }

        return redirect()->back()->with('success', 'Bebida salva com sucesso.');
    }

    public function createImage($imagem, $nm_ref){
        $image = $imagem;
        $imagePath = public_path('img/bebidas');

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
    public function createBebida($nome, $desc, $valor, $qtd, $img, $slug)
    {
        return Bebida::firstOrCreate([
            'nm_bebida' => $nome,
            'desc_bebida' => $desc,
            'vl_bebida' => str_replace(",", ".", $valor),
            'qt_bebida' => $qtd,
            'img_bebida' => $img,
            'slug_bebida' => $slug
        ]);
    }

    //==================================================================================================================
    //DELETA A REFEIÇÃO
    public function deleteBebida($id){
        try{
            $ref = Bebida::find($id);
            $this->deleteImageFile($ref->img_bebida);
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
        $rootProductsPath = public_path('img/bebidas/');

        unlink($rootProductsPath . $caminhoImagem);
    }

    //==================================================================================================================
    //ATUALIZA A REFEIÇÃO
    public function atualizaBebida(Request $request){
        //dd($request->all());
        try{
            $bebida = Bebida::find($request->id_bebida);
            //dd($ref);
            $bebida->nm_bebida = $request->nm_bebida;
            $bebida->qt_bebida = $request->qt_bebida;
            $bebida->vl_bebida = str_replace(",", ".", $request->vl_bebida);
            $bebida->desc_bebida = $request->desc_bebida;
            $slugname = str_slug($request->nm_bebida, '-');
            $bebida->slug_bebida = $slugname;

            if($request->hasFile('images')){
                $this->deleteImageFile($bebida->img_bebida);
                $imageName = $this->createImage($request->images, $request->nm_bebida);
                $bebida->img_bebida = $imageName;
            }

            $bebida->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar atualizar bebida.');
        }

        return redirect()->back()->with('success', 'Bebida atualizada com sucesso.');
    }
}
