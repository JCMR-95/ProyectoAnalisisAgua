<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use View;

class RioController extends Controller
{
    public function validar(Request $request){
        $reglas = [
            'fecha' => 'required',
            'arsenico' => 'required|regex:/^(\d*,)?\d+$/',
            'boro' => 'required|regex:/^(\d*,)?\d+$/',
            'cloro' => 'required|regex:/^(\d*,)?\d+$/',
            'cobalto' => 'required|regex:/^(\d*,)?\d+$/',
            'cromo' => 'required|regex:/^(\d*,)?\d+$/',
            'cobre' => 'required|regex:/^(\d*,)?\d+$/',
            'ph' => 'required|regex:/^(\d*,)?\d+$/',
            'plomo' => 'required|regex:/^(\d*,)?\d+$/',
            'zinc' => 'required|regex:/^(\d*,)?\d+$/',
            'condElectric' => 'required|regex:/^(\d*,)?\d+$/',
            'bico3' => 'required|regex:/^(\d*,)?\d+$/'
        ];
        $mensajes=[
            'fecha.required' => 'Debe seleccionar una fecha valida.',
            'arsenico.required' => 'Debe introducir una cantidad númerica.',
            'boro.required' => 'Debe introducir una cantidad númerica.',
            'cloro.required' => 'Debe introducir una cantidad númerica.',
            'cobalto.required' => 'Debe introducir una cantidad númerica.',
            'cromo.required' => 'Debe introducir una cantidad númerica.',
            'cobre.required' => 'Debe introducir una cantidad númerica',
            'ph.required' => 'Debe introducir una cantidad númerica.',
            'plomo.required' => 'Debe introducir una cantidad númerica.',
            'zinc.required' => 'Debe introducir una cantidad númerica.',
            'condElectric.required' => 'Debe introducir una cantidad númerica.',
            'bico3.required' => 'Debe introducir una cantidad númerica.',
            'arsenico.regex' => 'Debe introducir una cantidad númerica.',
            'boro.regex' => 'Debe introducir una cantidad númerica.',
            'cloro.regex' => 'Debe introducir una cantidad númerica.',
            'cobalto.regex' => 'Debe introducir una cantidad númerica.',
            'cromo.regex' => 'Debe introducir una cantidad númerica.',
            'cobre.regex' => 'Debe introducir una cantidad númerica',
            'ph.regex' => 'Debe introducir una cantidad númerica.',
            'plomo.regex' => 'Debe introducir una cantidad númerica.',
            'zinc.regex' => 'Debe introducir una cantidad númerica.',
            'condElectric.regex' => 'Debe introducir una cantidad númerica.',
            'bico3.regex' => 'Debe introducir una cantidad númerica.'
        ];

        $this->validate($request, $reglas, $mensajes);
    }

    public function verDetalles(Request $request)
    {
        $sector = request()->sector;

        $datosQuimicos = DB::select('select 

        fecha,
        arsenico,
        boro,
        cobalto,
        cloro,
        cobre,
        cromo,
        ph,
        plomo,
        zinc,
        consumo,
        bico3,
        calidadHumana,
        calidadRiego

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


    public function verPrediccion(Request $request)
    {
        self::validar($request);
        $sector = $request->sector;
        $fecha = $request->fecha;
        $arsenico = $request->arsenico;
        $boro = $request->boro;
        $cobalto = $request->cobalto;
        $cloro = $request->cloro;
        $cobre = $request->cobre;
        $cromo = $request->cromo;
        $ph = $request->ph;
        $plomo = $request->plomo;
        $zinc = $request->zinc;
        $conducElectric = $request->condElectric;
        $bico3 = $request->bico3;
        $calidadHumana = $this->calcularCalidadHumana($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric);
        $calidadRiego = $this->calcularCalidadRiego($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric);

        DB::table('tabla_prediccion_rio')->insert(
            ['idPuntoRio' => $sector, 
            'fecha' => $fecha,
            'arsenico' => $arsenico,
            'boro' => $boro,
            'cloro' => $cloro,
            'cobalto' => $cobalto,
            'cobre' => $cobre,
            'cromo' => $cromo,
            'ph' => $ph,
            'plomo' => $plomo,
            'zinc' => $zinc,
            'consumo' => $conducElectric,
            'bico3' => $bico3,
            'calidadHumana' => $calidadHumana,
            'calidadRiego' => $calidadRiego]
        );
        $this->checkCalidad($calidadHumana);
        return View::make('Mensajes');

    }
    public function checkCalidad($calidadHumana){
        if($calidadHumana == "No Apta"){
            Session::flash('noApto', 'Resultado: No Apta. Existen uno o más elementos que están sobre el límite permitido para el consumo humano y uso de riego, por lo tanto no se puede usar.');
        }else{
            if($calidadHumana == "Calidad Baja"){
                Session::flash('bajo', 'Resultado: Calidad Baja.');
            }else{
                if($calidadHumana == "Calidad Neutra"){
                    Session::flash('neutro', 'Resultado: Calidad Neutra.');
                }else{
                    Session::flash('alto', 'Resultado: Calidad Alta.');
                }
            }
        }
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

    public function calcularCalidadHumana($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric){
        if($arsenico >= 0.2 || $boro >= 0.75 || $cobalto >= 0.05 || $cloro >= 400 || $cobre >= 2 || $cromo >= 0.05 || $ph >= 9 || $plomo >= 0.05 || $zinc >= 3 || $conducElectric >= 3000){

            $calidadHumana = "No Apta";
        }else{
            if($arsenico >= 0.02 || $boro >= 0.5 || $cobalto >= 0.02 || $cloro >= 250 || $cobre >= 1.25 || $cromo >= 0.03 || $ph >= 8.4 || $plomo >= 0.03 || $zinc >= 2 || $conducElectric >= 1500){

                $calidadHumana = "Calidad Baja";
            }else{
                if($arsenico >= 0.01 || $boro >= 0.25 || $cobalto >= 0.01 || $cloro >= 100 || $cobre >= 0.5 || $cromo >= 0.01 || $ph >= 7 || $plomo >= 0.01 || $zinc >= 1 || $conducElectric >= 750){
                    $calidadHumana = "Calidad Neutra";
                }else{
                    $calidadHumana = "Calidad Alta";

                }
            }
        }
        return $calidadHumana;
    }

    public function calcularCalidadRiego($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric){

        if($arsenico >= 0.2 || $boro >= 0.75 || $cobalto >= 0.05 || $cloro < 180 || $cobre >= 0.2 || $cromo >= 0.1 || $ph >= 9 || $plomo >= 0.5 || $zinc >= 2 || $conducElectric >= 3000){

            $calidadRiego = "No Apta";

        }else{
            
            $calidadRiego = "Calidad Baja";

        }
        return $calidadRiego;
    }

    public function getFechas(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('tabla_quimicos_rios')->where($select, $value)->get();
        $output = '<option value="">Seleccione una '.$dependent.'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }

    public function getEstado(Request $request){
        $sector = $request->sector;
        $fecha = $request->fecha;
        $data = DB::table('tabla_quimicos_rios')->where(['idPuntoRio' => $sector, 'fecha' => $fecha])->first();
        $this->checkCalidad($data->calidadHumana);
        return View::make('Mensajes');
    }

}