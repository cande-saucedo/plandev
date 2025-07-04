<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'titulo',
        'descripcion',
        'estatus',
        'fecha_limite',
        'asignado_a',
        'prioridad'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function desarrollador()
    {
        return $this->belongsTo(User::class, 'asignado_a');
    }

}
