<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla_quimicos_rios extends Model
{
    protected $fillable = [
        'idPuntoRio',
        'fecha',
        'arsenico',
        'boro',
        'cloro',
        'cobalto',
        'cobre',
        'cromo',
        'ph',
        'plomo',
        'zinc',
        'consumo',
        'bico3',
        'calidadHumana',
        'calidadRiego'
    ];

}