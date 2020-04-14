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

        $datosQuimicos = DB::select('select 

        fecha,
        arsenico, unidadArsenico,
        boro, unidadBoro,
        cobre, unidadCobre,
        cromo, unidadCromo,
        plomo, unidadPlomo,
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

        return view('DetallesEspecificosRio',compact('datosQuimicos', 'datosInfo'));

    }

    public function verPrediccion(Request $request)
    {

        dd("Wena men");

    }

    public function guardarHistorial(Request $request)
    {

        $idPuntoRio = request()->idPuntoRio;
        $fechaRio = request()->fechaRio;

        $hoy = getdate();

        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $año = $hoy['year'];
        
        $fechaActual = $dia . "/" . $mes . "/" . $año;

        DB::table('tabla_historial')->insert([

            'fechaActual'  => $fechaActual,
            'idPuntoRio'   => $idPuntoRio,
            'fechaRio'     => $fechaRio

        ]);
        

    
    }


}