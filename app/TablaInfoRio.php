<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TablaInfoRio extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'idPuntoRio',
        'nombreEstacion',
        'codBNA', 
        'altitud',
        'cuenca',
        'latitud',
        'longitud',
        'utmNorte',
        'unidadNorteUTM',
        'utmEste',
        'unidadEsteUTM'

    ];


}