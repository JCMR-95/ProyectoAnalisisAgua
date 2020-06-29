<?php

namespace App\Exports;

use App\tabla_prediccion_rios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrediccionesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tabla_prediccion_rios::all();
    }

    public function headings(): array

    {
        return [
            'Fila',
            'Datos de Descarga',
            'Datos de Descarga',
            'ID de Punto del Rio',
            'Fecha',
            'Arsenico',
            'Boro',
            'Cloro',
            'Cobalto',
            'Cobre',
            'Cromo',
            'PH',
            'Plomo',
            'Zinc',
            'Conductividad Eléctrica',
            'BiCO3',
            'Calidad de Consumo Humano'
        ];
    }
}
