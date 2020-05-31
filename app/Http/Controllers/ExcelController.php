<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ExcelImportQuimicos;
use App\Imports\ExcelImportInfo;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\ExcelExport;
use App\Exports\HistoricoExport;
use DB;


class ExcelController extends Controller
{
    
    public function importExcelQuimicos(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportQuimicos, $file);

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


        return back()->with('message', 'Importanción completada');
    }

    public function importExcelInfo(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportInfo, $file);

        return back()->with('message', 'Importanción completada');
    }

    public function exportarHistorico()
    {
        return Excel::download(new HistoricoExport, 'Historico.xlsx');
    }

    public function exportarPredicciones()
    {
        return Excel::download(new PrediccionesExport, 'Predicciones.xlsx');
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

}


