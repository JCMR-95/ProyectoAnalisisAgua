<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RioController extends Controller
{

    public function verDetalles(Request $request)
    {
        $sector = request()->sector;

        $datosQuimicos = DB::select('select 

        fecha,
        aluminio, unidadAluminio,
        arsenico, unidadArsenico,
        boro, unidadBoro,
        cloro, unidadCloro,
        cadmio, unidadCadmio,
        calcio, unidadCalcio,
        cobre, unidadCobre,
        cromo, unidadCromo,
        hierro, unidadHierro,
        fosfato, unidadFosfato,
        magnesio, unidadMagnesio,
        manganeso, unidadManganeso,
        molibdeno, unidadMolibdeno,
        nitrato, unidadNitrato,
        niquel, unidadNiquel,
        oxigeno, unidadOxigeno,
        ph, unidadPh,
        plata, unidadPlata,
        plomo, unidadPlomo,
        potasio, unidadPotasio,
        selenio, unidadSelenio,
        sodio, unidadSodio,
        zinc, unidadZinc

        from tabla_quimicos_rios 
        
        where idPuntoRio = :sector', ['sector' => $sector]);


        $datosInfo = DB::select('select 
        idPuntoRio,
        nombreEstacion,
        codBNA, 
        altitud,
        cuenca,
        latitud,
        longitud,
        utmNorte,
        unidadNorteUTM,
        utmEste,
        unidadEsteUTM

        from tabla_info_rios
        
        where idPuntoRio = :sector', ['sector' => $sector]);

        
        return view('DetallesRio',compact('datosQuimicos', 'datosInfo'));

    }

    public function verDetallesEspecificos(Request $request)
    {
        $sector = request()->sector;

        $listadoQuimicos = request()->skills;

        $elemento1 = $listadoQuimicos[0];
        $elemento2 = $listadoQuimicos[1];
        $elemento3 = $listadoQuimicos[2];
        $elemento4 = $listadoQuimicos[3];
        $elemento5 = $listadoQuimicos[4];
        $elemento6 = $listadoQuimicos[5];
        $elemento7 = $listadoQuimicos[6];

        $mayuscula1 = ucfirst($elemento1);
        $mayuscula2 = ucfirst($elemento2);
        $mayuscula3 = ucfirst($elemento3);
        $mayuscula4 = ucfirst($elemento4);
        $mayuscula5 = ucfirst($elemento5);
        $mayuscula6 = ucfirst($elemento6);
        $mayuscula7 = ucfirst($elemento7);

        $unidadElemento1 = "unidad".$mayuscula1;
        $unidadElemento2 = "unidad".$mayuscula2;
        $unidadElemento3 = "unidad".$mayuscula3;
        $unidadElemento4 = "unidad".$mayuscula4;
        $unidadElemento5 = "unidad".$mayuscula5;
        $unidadElemento6 = "unidad".$mayuscula6;
        $unidadElemento7 = "unidad".$mayuscula7;


        $query = DB::table('tabla_quimicos_rios')
        ->where('idPuntoRio', $sector);

        $datosQuimicos = $query->addSelect(
            'fecha',
            $elemento1, $unidadElemento1,
            $elemento2, $unidadElemento2,
            $elemento3, $unidadElemento3,
            $elemento4, $unidadElemento4,
            $elemento5, $unidadElemento5,
            $elemento6, $unidadElemento6,
            $elemento7, $unidadElemento7)
        ->get();


        $datosInfo = DB::select('select 
        idPuntoRio,
        nombreEstacion,
        codBNA, 
        altitud,
        cuenca,
        latitud,
        longitud,
        utmNorte,
        unidadNorteUTM,
        utmEste,
        unidadEsteUTM

        from tabla_info_rios
        
        where idPuntoRio = :sector', ['sector' => $sector]);

        return view('DetallesEspecificosRio',compact('datosQuimicos', 'datosInfo'));

    }


}