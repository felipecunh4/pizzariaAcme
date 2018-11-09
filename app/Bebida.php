<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    protected $primaryKey = 'id_bebida';
    protected $table = 'bebidas';

    public $timestamps = false;

    protected  $fillable = [
      'nm_bebida', 'vl_bebida', 'qt_bebida', 'img_bebida', 'desc_bebida', 'slug_bebida'
    ];
}
