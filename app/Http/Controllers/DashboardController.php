<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\BitacoraDiaria;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProyectos = Proyecto::count();
        $tareasActivas = Tarea::where('estatus', '!=', 'Completada')->count();
        $bitacorasHoy = BitacoraDiaria::whereDate('fecha', now())->count();
        $usuarios = User::count();

        // Datos para gráfico: tareas por prioridad
        $tareasPorPrioridad = Tarea::selectRaw('prioridad, COUNT(*) as total')
                                    ->groupBy('prioridad')
                                    ->pluck('total', 'prioridad');

        $proyectosPorEstatus = Proyecto::selectRaw('estatus, COUNT(*) as total')
                                ->groupBy('estatus')
                                ->pluck('total', 'estatus');

        $tareasPorEstatus = Tarea::selectRaw('estatus, COUNT(*) as total')
                        ->groupBy('estatus')
                        ->pluck('total', 'estatus');

        return view('dashboard', compact(
            'totalProyectos', 'tareasActivas', 'bitacorasHoy', 'usuarios', 'tareasPorPrioridad','proyectosPorEstatus','tareasPorEstatus'
        ));
    }
}
