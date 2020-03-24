<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class TablaQuimicosRio extends Authenticatable
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
        'aluminio', 'unidadAluminio',
        'arsenico', 'unidadArsenico',
        'boro', 'unidadBoro',
        'cloro', 'unidadCloro',
        'cadmio', 'unidadCadmio',
        'calcio', 'unidadCalcio',
        'cobre', 'unidadCobre',
        'cromo', 'unidadCromo',
        'hierro', 'unidadHierro',
        'fosfato', 'unidadFosfato',
        'magnesio', 'unidadMagnesio',
        'manganeso', 'unidadManganeso',
        'molibdeno', 'unidadMolibdeno',
        'nitrato', 'unidadNitrato',
        'niquel', 'unidadNiquel',
        'oxigeno', 'unidadOxigeno',
        'ph', 'unidadPh',
        'plata', 'unidadPlata',
        'plomo', 'unidadPlomo',
        'potasio', 'unidadPotasio',
        'selenio', 'unidadSelenio',
        'sodio', 'unidadSodio',
        'zinc', 'unidadZinc'
    ];


}