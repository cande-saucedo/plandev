@extends('layouts.app')

@section('title', 'Listado de Tareas')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Tareas</h2>
                        <a href="{{ route('tareas.create') }}" class="btn btn-info my-3">Agregar tarea</a>
                    </div>   

                </div>
                <div class="card-body h-100">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Proyecto</th>
                                <th>Tarea</th>
                                <th>Programador (a)</th>
                                <th>Fecha límite</th>
                                <th>Estatus</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->proyecto->nombre ?? 'Sin proyecto' }}</td>
                                    <td>{{ $tarea->titulo }}</td>
                                    <td>{{ $tarea->desarrollador->name ?? 'Sin desarrollador' }}</td>
                                    <td>{{ $tarea->fecha_limite }}</td>
                                    <td>{{ $tarea->estatus }}</td>
                                    <td>{{ $tarea->prioridad }}</td>
                                    <td>
                                        <a href="{{ route('tareas.edit', [$tarea]) }}" class="btn btn-sm btn-success">Editar</a>
                                        <form action="{{ route('tareas.destroy', [$tarea]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar tarea?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4">Sin tareas registradas.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
</div>
@endsection
