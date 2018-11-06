<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefeicaoController extends Controller
{
    public function indexRefeicao(){
        return view('pages.admin.cadRefeicao');
    }
}
