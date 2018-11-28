<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = "cardapio";
    protected  $primaryKey = "id_cardapio";

    public $timestamps = false;

    protected $fillable = [
        'nm_cardapio', 'desc_cardapio', 'img_cardapio', 'vl_cardapio', 'qt_cardapio', 'slug_cardapio', 'fk_tipo_ref'
    ];
}
