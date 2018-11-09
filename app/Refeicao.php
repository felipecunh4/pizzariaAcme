<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = "refeicoes";
    protected  $primaryKey = "id_refeicao";

    public $timestamps = false;

    protected $fillable = [
        'nm_refeicao', 'desc_refeicao', 'img_refeicao', 'vl_refeicao', 'qt_refeicao', 'slug_refeicao'
    ];
}
