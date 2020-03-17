<?php

namespace App\Imports;

use App\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TablaQuimicosRio;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new TablaQuimicosRio([
            'aluminio'     => $row[1], 
            'unidadAluminio'    => $row[2], 
        ]);

    }
}
