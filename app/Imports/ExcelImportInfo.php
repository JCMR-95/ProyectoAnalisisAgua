<?php

namespace App\Imports;

use App\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TablaInfoRio;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImportInfo implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new TablaInfoRio([

            'idPuntoRio'   => $row[0],
            'nombreEstacion' => $row[1],
            'codBNA' => $row[2], 
            'altitud' => $row[3],
            'cuenca' => $row[4],
            'latitud' => $row[5],
            'longitud' => $row[6],
            'utmNorte' => $row[7],
            'unidadNorteUTM' => $row[8],
            'utmEste' => $row[9],
            'unidadEsteUTM' => $row[10]

            
        ]);
    }
}
