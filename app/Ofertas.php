<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    protected $table = "ofertas";
    protected $primaryKey = "id_oferta";

    public $timestamps = false;

    protected $fillable = [
        'fk_id_cardapio', 'vl_oferta', 'fk_id_dia'
    ];
}
