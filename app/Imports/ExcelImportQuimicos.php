<?php

namespace App\Imports;

use App\Excel;
use Maatwebsite\Excel\Concerns\ToModel;
use App\TablaQuimicosRio;

class ExcelImportQuimicos implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new TablaQuimicosRio([

            'idPuntoRio' => $row[0],
            'fecha' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1]),
            'aluminio' => $row[2], 'unidadAluminio'    => $row[3],
            'arsenico' => $row[4], 'unidadArsenico' => $row[5],
            'boro' => $row[6], 'unidadBoro' => $row[7],
            'cloro' => $row[8], 'unidadCloro' => $row[9],
            'cadmio' => $row[10], 'unidadCadmio' => $row[11],
            'calcio' => $row[12], 'unidadCalcio' => $row[13],
            'cobre' => $row[14], 'unidadCobre' => $row[15],
            'cromo' => $row[16], 'unidadCromo' => $row[17],
            'hierro' => $row[18], 'unidadHierro' => $row[19],
            'fosfato' => $row[20], 'unidadFosfato' => $row[21],
            'magnesio' => $row[22], 'unidadMagnesio' => $row[23],
            'manganeso' => $row[24], 'unidadManganeso' => $row[25],
            'molibdeno' => $row[26], 'unidadMolibdeno' => $row[27],
            'nitrato' => $row[28], 'unidadNitrato' => $row[29],
            'niquel' => $row[30], 'unidadNiquel' => $row[31],
            'oxigeno' => $row[32], 'unidadOxigeno' => $row[33],
            'ph' => $row[34], 'unidadPh' => $row[35],
            'plata' => $row[36], 'unidadPlata' => $row[37],
            'plomo' => $row[38], 'unidadPlomo' => $row[39],
            'potasio' => $row[40], 'unidadPotasio' => $row[41],
            'selenio' => $row[42], 'unidadSelenio' => $row[43],
            'sodio' => $row[44], 'unidadSodio' => $row[45],
            'zinc' => $row[46], 'unidadZinc' => $row[47]

        ]);

    }
}
