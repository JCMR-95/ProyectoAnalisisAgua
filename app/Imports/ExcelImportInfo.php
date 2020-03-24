<?php

namespace App\Imports;

use App\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TablaInfoRio;

class ExcelImportInfo implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TablaInfoRio([

            'idPuntoRio'   => $row[0],
            'puntoMedicion' => $row[1],
            'latitud' => $row[2], 
            'longitud' => $row[3],
            'altura' => $row[4]
            
        ]);
    }
}
