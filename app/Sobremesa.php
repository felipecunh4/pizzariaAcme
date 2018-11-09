<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sobremesa extends Model
{
    protected $primaryKey = 'id_sobremesa';
    protected $table = 'sobremesas';

    public $timestamps = false;

    protected  $fillable = [
      'nm_sobremesa', 'vl_sobremesa', 'qt_sobremesa', 'img_sobremesa', 'desc_sobremesa', 'slug_sobremesa'
    ];
}
