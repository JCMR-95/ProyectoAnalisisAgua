<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ExcelImportQuimicos;
use App\Imports\ExcelImportInfo;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\ExcelExport;
use App\Exports\HistoricoExport;
use App\Exports\PrediccionesExport;
use DB;


class ExcelController extends Controller
{
    
    /* Función que importa el Excel con los elementos químicos del río. */

    public function importExcelQuimicos(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportQuimicos, $file);

        return back()->with('message', 'Importanción completada');
    }

    /* Función que importa el Excel de la información sectorial del río. */

    public function importExcelInfo(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportInfo, $file);

        return back()->with('message', 'Importanción completada');
    }

    /* Función que descarga un Excel de los datos guardados en tabla_historico. */

    public function exportarHistorico()
    {
        return Excel::download(new HistoricoExport, 'Historico.xlsx');
    }

    /* Función que descarga un Excel de los datos guardados en tabla_predicción_rio. */

    public function exportarPredicciones()
    {
        return Excel::download(new PrediccionesExport, 'Predicciones.xlsx');
    }


}


