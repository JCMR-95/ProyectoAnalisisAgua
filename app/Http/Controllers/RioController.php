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
        arsenico,
        boro,
        cloro,
        cobalto,
        cobre,
        cromo,
        ph,
        plomo,
        zinc,
        consumo,
        bico3,
        calidadHumana

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
        

        //Hacer en una función aparte

        $cantidadDatos = \DB::table('tabla_quimicos_rios')->where('idPuntoRio', $sector)
        ->count();

        for ($i = 0; $i <= $cantidadDatos-1; $i++) {
            
            $fecha = $datosQuimicos[$i]->fecha;
            $arsenico = $datosQuimicos[$i]->arsenico;
            $boro = $datosQuimicos[$i]->boro;
            $cobalto = $datosQuimicos[$i]->cobalto;
            $cloro = $datosQuimicos[$i]->cloro;
            $cobre = $datosQuimicos[$i]->cobre;
            $cromo = $datosQuimicos[$i]->cromo;
            $ph = $datosQuimicos[$i]->ph;
            $plomo = $datosQuimicos[$i]->plomo;
            $zinc = $datosQuimicos[$i]->zinc;
            $conducElectric = $datosQuimicos[$i]->consumo;

            if($arsenico >= 0.2 || $boro >= 0.75 || $cobalto >= 0.05 || $cloro >= 400 || $cobre >= 2 || $cromo >= 0.05 || $ph >= 9 || $plomo >= 0.05 || $zinc >= 3 || $conducElectric >= 3000){

                DB::table('tabla_quimicos_rios')
                ->where('fecha', $fecha)
                ->update(['calidadHumana' => "No Apta"]);

            }else{
                if($arsenico >= 0.02 || $boro >= 0.5 || $cobalto >= 0.02 || $cloro >= 250 || $cobre >= 1.25 || $cromo >= 0.03 || $ph >= 8.4 || $plomo >= 0.03 || $zinc >= 2 || $conducElectric >= 1500){

                    DB::table('tabla_quimicos_rios')
                    ->where('fecha', $fecha)
                    ->update(['calidadHumana' => "Calidad Baja"]);

                }else{
                    if($arsenico >= 0.01 || $boro >= 0.25 || $cobalto >= 0.01 || $cloro >= 100 || $cobre >= 0.5 || $cromo >= 0.01 || $ph >= 7 || $plomo >= 0.01 || $zinc >= 1 || $conducElectric >= 750){

                        DB::table('tabla_quimicos_rios')
                        ->where('fecha', $fecha)
                        ->update(['calidadHumana' => "Calidad Neutra"]);

                    }else{

                        DB::table('tabla_quimicos_rios')
                        ->where('fecha', $fecha)
                        ->update(['calidadHumana' => "Calidad Alta"]);

                    }
                }

            }

        }

        
        return view('DetallesRio',compact('datosQuimicos', 'datosInfo'));

    }


    public function verPrediccion(Request $request)
    {

        $sector = $request->sector;
        $fecha = $request->fecha;
        $arsenico = $request->arsenico;
        $boro = $request->boro;
        $cloro = $request->cloro;
        $cobalto = $request->cobalto;
        $cobre = $request->cobre;
        $cromo = $request->cromo;
        $ph = $request->ph;
        $plomo = $request->plomo;
        $zinc = $request->zinc;
        $condElectric = $request->condElectric;
        $bico3 = $request->bico3;

        //Continuar mañana

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