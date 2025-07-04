<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index(Proyecto $proyecto)
    {
        $tareas = Tarea::with('proyecto')->orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create(Proyecto $proyecto)
    {
        $proyectos = \App\Models\Proyecto::orderBy('nombre')->get();
        $desarrolladores = User::where('rol', 'desarrollador')->orderBy('name')->get();
        return view('tareas.create', compact('proyectos','desarrolladores'));
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estatus' => 'required|in:Pendiente,En proceso,Completada',
            'fecha_limite' => 'nullable|date',
            'asignado_a' => 'nullable|exists:users,id',
            'prioridad' => 'required|in:Alta,Media,Baja'
        ]);

        \App\Models\Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Tarea $tarea)
    {
        $proyectos = \App\Models\Proyecto::orderBy('nombre')->get();
        $desarrolladores = User::where('rol', 'desarrollador')->orderBy('name')->get();
        return view('tareas.edit', compact('proyectos', 'desarrolladores','tarea'));
    }

    public function update(Request $request, Proyecto $proyecto, Tarea $tarea)
    {
        $request->validate([
            'proyecto_id' => 'required|exists:proyectos,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estatus' => 'required|in:Pendiente,En proceso,Completada',
            'fecha_limite' => 'nullable|date',
            'asignado_a' => 'nullable|exists:users,id',
            'prioridad' => 'required|in:Alta,Media,Baja'
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index', $proyecto)->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Proyecto $proyecto, Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index', $proyecto)->with('success', 'Tarea eliminada.');
    }
}
