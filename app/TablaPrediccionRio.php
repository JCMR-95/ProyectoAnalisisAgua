<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TablaPrediccionRio extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'bico3'
    ];


}