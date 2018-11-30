<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva';

    public $timestamps = false;

    protected $fillable = [
      'nm_cliente', 'qtd_pessoas', 'email', 'tel_contato', 'dia_reserva', 'hora_reserva'
    ];
}
