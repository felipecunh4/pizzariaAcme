<?php

namespace App\Http\Controllers;

use App\Http\Requests\SobremesaRequest;
use App\Sobremesa;
use Illuminate\Http\Request;
use Image;

class SobremesaController extends Controller
{
    public function indexSobremesa(){
        $sobremesas = Sobremesa::all();

        return view('pages.admin.cadSobremesa', compact('sobremesas'));
    }
    //==================================================================================================================
    //SALVA A SOBREMESA
    public function saveSobremesa(SobremesaRequest $request){
        //dd($request->all());

        try{
            if($request->hasFile('images')){

                $imageName = $this->createImage($request->images, $request->nm_sobremesa);

                $slugname = str_slug($request->nm_sobremesa, '-');

                $this->createSobremesa($request->nm_sobremesa, $request->desc_sobremesa, $request->vl_sobremesa, $request->qt_sobremesa, $imageName, $slugname);

            }
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar salvar sobremesa.');
        }

        return redirect()->back()->with('success', 'Sobremesa salva com sucesso.');
    }

    public function createImage($imagem, $nm_ref){
        $image = $imagem;
        $imagePath = public_path('img/sobremesas');

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
    //CRIA A SOBREMESA
    public function createSobremesa($nome, $desc, $valor, $qtd, $img, $slug)
    {
        return Sobremesa::firstOrCreate([
            'nm_sobremesa' => $nome,
            'desc_sobremesa' => $desc,
            'vl_sobremesa' => str_replace(",", ".", $valor),
            'qt_sobremesa' => $qtd,
            'img_sobremesa' => $img,
            'slug_sobremesa' => $slug
        ]);
    }

    //==================================================================================================================
    //DELETA A SOBREMESA
    public function deleteSobremesa($id){
        try{
            $sm = Sobremesa::find($id);
            $this->deleteImageFile($sm->img_sobremesa);
            $sm->delete();
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
        $rootProductsPath = public_path('img/sobremesas/');

        unlink($rootProductsPath . $caminhoImagem);
    }

    //==================================================================================================================
    //ATUALIZA A SOBREMESA
    public function atualizaSobremesa(Request $request){
        //dd($request->all());
        try{
            $sm = Sobremesa::find($request->id_sobremesa);
            //dd($ref);
            $sm->nm_sobremesa = $request->nm_sobremesa;
            $sm->qt_sobremesa = $request->qt_sobremesa;
            $sm->vl_sobremesa = str_replace(",", ".", $request->vl_sobremesa);
            $sm->desc_sobremesa = $request->desc_sobremesa;
            $slugname = str_slug($request->nm_sobremesa, '-');
            $sm->slug_sobremesa = $slugname;

            if($request->hasFile('images')){
                $this->deleteImageFile($sm->img_sobremesa);
                $imageName = $this->createImage($request->images, $request->nm_sobremesa);
                $sm->img_sobremesa = $imageName;
            }

            $sm->save();
        }
        catch (\Exception $e){
            return redirect()->back()->with('nosuccess', 'Erro ao tentar atualizar sobremesa.');
        }

        return redirect()->back()->with('success', 'Sobremesa atualizada com sucesso.');
    }
}
