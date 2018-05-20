<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  descripcion_evento
 */
class Evento extends Model
{
    protected $fillable = [
        'nombre_evento',
        'descripcion_evento',
        'categoria_id',
        'user_id',
        'fecha_inicio_evento',
        'hora_evento',
        'direccion_evento',
        'imagen',
        'estado_evento',
        'latitud',
        'longitud'
    ];


    public function ValidarPremium()
    {

    }
}
