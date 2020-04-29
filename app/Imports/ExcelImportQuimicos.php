<?php

namespace App\Imports;

use App\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TablaQuimicosRio;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImportQuimicos implements ToModel, WithStartRow
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

        return new TablaQuimicosRio([

            'idPuntoRio' => $row[0],
            'fecha' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]),
            'arsenico' => $row[2],
            'boro' => $row[3],
            'cloro' => $row[4],
            'cobalto' => $row[5],
            'cobre' => $row[6],
            'cromo' => $row[7],
            'ph' => $row[8],
            'plomo' => $row[9],
            'zinc' => $row[10],
            'consumo' => $row[11],
            'bico3' => $row[12]

        ]);

    }
}
