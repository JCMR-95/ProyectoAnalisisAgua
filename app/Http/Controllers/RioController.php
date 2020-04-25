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

    public function calcularReglasConsumoHumano()
    {

        $arsenico = 0;
        $boro = 0;
        $cobalto = 0;
        $cloro = 0;
        $cobre = 0;
        $cromo = 0;
        $ph = 0;
        $plomo = 0;
        $zinc = 0;
        $conducElectric = 0;

        if($arsenico >= 0.2 || $boro >= 0.75 || $cobalto >= 0.05 || $cloro >= 400 || $cobre >= 2 || $cromo >= 0.05 || $ph >= 9 || $plomo >= 0.05 || $zinc >= 3 || $conducElectric >= 3000){

            dd("No Apta");

        }else{
            if($arsenico >= 0.02 || $boro >= 0.5 || $cobalto >= 0.02 || $cloro >= 250 || $cobre >= 1.25 || $cromo >= 0.03 || $ph >= 8.4 || $plomo >= 0.03 || $zinc >= 2 || $conducElectric >= 1500){

                dd("Calidad Baja");

            }else{
                if($arsenico >= 0.01 || $boro >= 0.25 || $cobalto >= 0.01 || $cloro >= 100 || $cobre >= 0.5 || $cromo >= 0.01 || $ph >= 7 || $plomo >= 0.01 || $zinc >= 1 || $conducElectric >= 750){

                    dd("Calidad Neutra");

                }else{

                    dd("Calidad Alta");

                }
            }

        }


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