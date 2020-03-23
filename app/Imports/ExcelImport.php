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
            'aluminio'     => $row[1], 'unidadAluminio'    => $row[2],
            'arsenico' => $row[3], 'unidadArsenico' => $row[4],
            'boro' => $row[5], 'unidadBoro' => $row[6],
            'cloro' => $row[7], 'unidadCloro' => $row[8],
            'cadmio' => $row[9], 'unidadCadmio' => $row[10],
            'calcio' => $row[11], 'unidadCalcio' => $row[12],
            'cobre' => $row[13], 'unidadCobre' => $row[14],
            'cromo' => $row[15], 'unidadCromo' => $row[16],
            'hierro' => $row[17], 'unidadHierro' => $row[18],
            'fosfato' => $row[19], 'unidadFosfato' => $row[20],
            'magnesio' => $row[21], 'unidadMagnesio' => $row[22],
            'manganeso' => $row[23], 'unidadManganeso' => $row[24],
            'molibdeno' => $row[25], 'unidadMolibdeno' => $row[26],
            'nitrato' => $row[27], 'unidadNitrato' => $row[28],
            'niquel' => $row[29], 'unidadNiquel' => $row[30],
            'oxigeno' => $row[31], 'unidadOxigeno' => $row[32],
            'ph' => $row[33], 'unidadPh' => $row[34],
            'plata' => $row[35], 'unidadPlata' => $row[36],
            'plomo' => $row[37], 'unidadPlomo' => $row[38],
            'potasio' => $row[39], 'unidadPotasio' => $row[40],
            'selenio' => $row[41], 'unidadSelenio' => $row[42],
            'sodio' => $row[43], 'unidadSodio' => $row[44],
            'zinc' => $row[45], 'unidadZinc' => $row[46]

        ]);

    }
}
