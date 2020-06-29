<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use View;

class RioController extends Controller
{

    /* Función que verifica el formato a ingresar de todos los elementos químicos, desplegando
    un mensaje correspondiente en caso de un error. */
    
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

    
    /* Función que carga todos los datos de la tabla_quimicos_rios según el sector seleccionado en 
    Historico.blade.php para luego desplegarlos en la vista DetallesRio.blade.php */

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


    /* Función que obtiene todos los datos enviados de cada elemento químicco para luego re-enviarlos a 
    "calcularCalidadHumana" y "calcularCalidadRiego", sus resultados obtenidos los guardará en tabla_prediccion_rio
    y luego desplegará un mensaje por pantalla. */

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
        $this->checkCalidad($calidadHumana, $calidadRiego);
        return View::make('Mensajes');

    }

    /* Función que despliega un mensaje por pantalla dependiendo de los valores $calidadHumana y $calidadRiego */

    public function checkCalidad($calidadHumana, $calidadRiego){

        if($calidadHumana == "No Apta" && $calidadRiego == "No Apta"){
            Session::flash('noAptoNoApto', 'Resultado: Calidad Humana NO APTA - Calidad Riego NO APTA.');
        }
        if($calidadHumana == "Calidad Baja" && $calidadRiego == "No Apta"){
            Session::flash('bajoNoApto', 'Resultado: Calidad Humana BAJA - Calidad Riego NO APTA.');
            
        }
        if($calidadHumana == "Calidad Neutra" && $calidadRiego == "No Apta"){
            Session::flash('neutroNoApto', 'Resultado: Calidad Humana NEUTRA - Calidad Riego NO APTA.');
        }
        if($calidadHumana == "Calidad Alta" && $calidadRiego == "No Apta"){
            Session::flash('altoNoApto', 'Resultado: Calidad Humana ALTA - Calidad Riego NO APTA.');
        }


        if($calidadHumana == "No Apta" && $calidadRiego == "Calidad Baja"){
            Session::flash('noAptoBajo', 'Resultado: Calidad Humana NO APTA - Calidad Riego BAJA.');
        }
        if($calidadHumana == "Calidad Baja" && $calidadRiego == "Calidad Baja"){
            Session::flash('bajoBajo', 'Resultado: Calidad Humana BAJA - Calidad Riego BAJA.');
            
        }
        if($calidadHumana == "Calidad Neutra" && $calidadRiego == "Calidad Baja"){
            Session::flash('neutroBajo', 'Resultado: Calidad Humana NEUTRA - Calidad Riego BAJA.');
        }
        if($calidadHumana == "Calidad Alta" && $calidadRiego == "Calidad Baja"){
            Session::flash('altoBajo', 'Resultado: Calidad Humana ALTA - Calidad Riego BAJA.');
        }
                     
    }


    /* Función que guarda la fecha de una consulta, actualmente NO se está ocupando esta función, pero
    puede ser útil para una versión futura. */

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


    /* Función que calcula $calidadHumana y $calidadRiego para rellenar los campos calidadHumana y calidadRiego 
    de tabla_quimicos_rios. También obtiene el nombre del sector del río dependiendo de su $idPuntoRio. */

    public function completarDatosHistorico(){

        $datosQuimicos = DB::select('select 

        idPuntoRio,
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

        from tabla_quimicos_rios');

        $cantidadDatos = \DB::table('tabla_quimicos_rios')->count();

        for ($i = 0; $i <= $cantidadDatos-1; $i++) {
            
            $idPuntoRio = $datosQuimicos[$i]->idPuntoRio;
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
            $calidadHumana = $this->calcularCalidadHumana($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric);
            $calidadRiego = $this->calcularCalidadRiego($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric);
            $nombreSector = $this->obtenerNombreSector($idPuntoRio);

                DB::table('tabla_quimicos_rios')
                ->where('fecha', $fecha)
                ->update(['calidadHumana' => $calidadHumana]);

                DB::table('tabla_quimicos_rios')
                ->where('fecha', $fecha)
                ->update(['calidadRiego' => $calidadRiego]);

                DB::table('tabla_quimicos_rios')
                ->where('idPuntoRio', $idPuntoRio)
                ->update(['nombreSector' => $nombreSector]);

        }

        return back()->with('message', 'Cálculo Completado');

    }


    /* Función que calcula la Calidad de Consumo Humano según los valores de los elementos químicos, para luego
    retornar un parámetro indicando la situación. Sus resultados son ocupados en varias funciones. */

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


    /* Función que calcula la Calidad de Riego según los valores de los elementos químicos, para luego
    retornar un parámetro indicando la situación. Sus resultados son ocupados en varias funciones. */

    public function calcularCalidadRiego($arsenico, $boro, $cloro, $cobalto, $cobre, $cromo, $ph, $plomo, $zinc, $conducElectric){

        if($arsenico >= 0.2 || $boro >= 0.75 || $cobalto >= 0.05 || $cloro < 180 || $cobre >= 0.2 || $cromo >= 0.1 || $ph >= 9 || $plomo >= 0.5 || $zinc >= 2 || $conducElectric >= 3000){

            $calidadRiego = "No Apta";

        }else{
            
            $calidadRiego = "Calidad Baja";

        }
        return $calidadRiego;
    }


    /* Funcion que retorna un parámetro con el nombre del sector del río sependiendo de $idPuntoRio que se
    le envíe. */

    public function obtenerNombreSector($idPuntoRio){

        $nombreSector = null;

        if($idPuntoRio == "001"){
            $nombreSector = "Junto Río Salado";
        }
        if($idPuntoRio == "002"){
            $nombreSector = "Angostura";
        }
        if($idPuntoRio == "003"){
            $nombreSector = "Sifón Ayquina";
        }
        if($idPuntoRio == "004"){
            $nombreSector = "Pozo Chiu Chiu";
        }
        if($idPuntoRio == "005"){
            $nombreSector = "Yalquincha";
        }
        if($idPuntoRio == "006"){
            $nombreSector = "Escorial";
        }
        if($idPuntoRio == "007"){
            $nombreSector = "Finca";
        }

        return $nombreSector;
    }


    /* Función actualmente en desarrollo. */

    public function eliminarRepetidosHistorico(){

        $datosQuimicos = DB::select('select * from tabla_quimicos_rios');
      
        $cantidadDatos = \DB::table('tabla_quimicos_rios')->count();

        for ($i = 0; $i <= $cantidadDatos-1; $i++) {
            
            $idPuntoRio1 = $datosQuimicos[$i]->idPuntoRio;
            $fecha1 = $datosQuimicos[$i]->fecha;

            for ($j = $i + 1; $j <= $cantidadDatos-$i; $j++) {
            
                $idPuntoRio2 = $datosQuimicos[$j]->idPuntoRio;
                $fecha2 = $datosQuimicos[$j]->fecha;

                if($idPuntoRio1 == $idPuntoRio2 && $fecha1 == $fecha2){
                    
                    $datoRepetido = DB::table('tabla_quimicos_rios')->where('fecha', $fecha2)->first();
                    $idDelRepetido = $datoRepetido->id;

                    DB::table('tabla_quimicos_rios')->where('id', '=', $idDelRepetido)->delete();
                    
                    $cantidadDatos = $cantidadDatos-1;

                }
            }
        }

        return back()->with('message', 'Listo');

    }


    /*  */

    public function getSeccion(){
        $datas = DB::table('tabla_info_rios')->get();
        $output = '<option value="">Seleccione una sección del río</option>';
        foreach($datas as $data){
            $output .= '<option value="'.$data->idPuntoRio.'">'.$data->nombreEstacion.'</option>';
        }
        echo $output;
    }


    /*  */
    
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


    /*  */
    public function getEstado(Request $request){
        $sector = $request->sector;
        $fecha = $request->fecha;
        $data = DB::table('tabla_quimicos_rios')->where(['idPuntoRio' => $sector, 'fecha' => $fecha])->first();
        $this->checkCalidad($data->calidadHumana, $data->calidadRiego);
        return View::make('Mensajes');
    }

}