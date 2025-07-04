<?php

namespace App\Exports;

use App\Models\Proyecto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProyectosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Proyecto::select('id', 'nombre', 'descripcion', 'fecha_inicio', 'estatus', 'created_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Nombre', 'Descripción', 'Fecha de inicio', 'Estatus', 'Creado'];
    }
}
