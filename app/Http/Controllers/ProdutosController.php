<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function indexApp(){
        return view('pages.app.index');
    }
}
