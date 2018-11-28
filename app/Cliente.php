<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $primaryKey = "id_cliente";

    public $timestamps = false;

    protected $fillable = [
       "nm_cliente", "sobrenome_cliente", "email", "password", "dt_nasc_cliente", "cpf_cliente", "cel_cliente"
    ];
}
