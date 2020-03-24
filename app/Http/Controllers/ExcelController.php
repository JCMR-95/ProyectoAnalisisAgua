<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ExcelImportQuimicos;
use App\Imports\ExcelImportInfo;



class ExcelController extends Controller
{
    
    public function importExcelQuimicos(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportQuimicos, $file);

        return back()->with('message', 'Importanción completada');
    }

    public function importExcelInfo(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImportInfo, $file);

        return back()->with('message', 'Importanción completada');
    }

}


