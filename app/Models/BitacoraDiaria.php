<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitacoraDiaria extends Model
{
    protected $fillable = [
        'fecha', 'tarea_id', 'user_id', 'descripcion', 'bloqueos'
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
