<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitacoraDiaria;

class BitacoraDiariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = BitacoraDiaria::get();
        return view('bitacora.index',compact('bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $tareas = \App\Models\Tarea::with('proyecto')->orderBy('titulo')->get();
       return view('bitacora.create', compact('tareas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'tarea_id' => 'nullable|exists:tareas,id',
            'descripcion' => 'required|string',
            'bloqueos' => 'nullable|string',
        ]);

        BitacoraDiaria::create([
            'fecha' => $request->fecha,
            'tarea_id' => $request->tarea_id,
            'descripcion' => $request->descripcion,
            'bloqueos' => $request->bloqueos,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('bitacora-diaria.index')->with('success', 'Registro guardado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
