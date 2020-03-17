<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ExcelImport;



class ExcelController extends Controller
{
    
    public function importExcel(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new ExcelImport, $file);

        return back()->with('message', 'Importanción de usuarios completada');
    }
}


