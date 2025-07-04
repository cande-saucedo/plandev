<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
   /*Este controlador cubre el ciclo completo CRUD para proyectos:

        index → lista con búsqueda y filtros

        create → formulario nuevo

        store → guardar nuevo

        edit → formulario edición

        update → guardar cambios

        destroy → eliminar*/
        
    public function index(Request $request)
    {
        //Muestra la lista de proyectos, y acepta un Request para aplicar filtros o búsqueda.
        $query = Proyecto::query();

        //Si el filtro de estatus viene lleno (Planeado, Completado, etc.), se aplica a la consulta.
        if ($request->filled('estatus')) {
            $query->where('estatus', $request->estatus);
        }

        //Si hay un término de búsqueda, se filtran los proyectos cuyo nombre contenga ese texto.
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%');
        }

        //Se ordenan por fecha de creación (más recientes primero) y se usa paginación (10 por página).
        $proyectos = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        //Devuelve la vista proyectos.index con la variable $proyectos.
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        //Muestra el formulario para crear un nuevo proyecto.
        return view('proyectos.create');
    }

    public function store(Request $request)
    {   
        //Valida los campos recibidos del formulario.
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'estatus' => 'required|in:Planeado,En progreso,Completado,Cancelado',
        ]);

        //Guarda el nuevo proyecto con todos los datos enviados (que pasaron la validación).
        Proyecto::create($request->all());

        //Redirige a la lista con un mensaje de éxito.
        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }

    public function edit(Proyecto $proyecto)
    {
        //Muestra el formulario para editar un proyecto específico.
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {  
        //Se vuelve a validar como en el store().
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'estatus' => 'required|in:Planeado,En progreso,Completado,Cancelado',
        ]);

        //Aplica los cambios al modelo existente.
        $proyecto->update($request->all());

        //Redirige con mensaje de éxito.
        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Proyecto $proyecto)
    {   
        //Elimina el proyecto recibido y redirige con mensaje.
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.');
    }
}
