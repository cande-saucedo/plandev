@extends('layouts.app')

@section('title', 'Bitácora de Actividades')

@section('content')
<div class="container mt-4">


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Bitácora de actividades</h2>
                        <a href="{{ route('bitacora-diaria.create') }}" class="btn btn-info my-3">Agregar actividad</a>
                    </div>   

                </div>
                <div class="card-body h-100">
                     <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Fecha</th>
                                <th>Tarea</th>
                                <th>Usuario</th>
                                <th>Resumen</th>
                                <th>Bloqueos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bitacoras  as $bitacora)
                                <tr>
                                    <td>{{ $bitacora->fecha }}</td>
                                    <td>{{ $bitacora->tarea?->titulo ?? 'N/A' }}</td>
                                    <td>{{ $bitacora->usuario?->name ?? 'N/A' }}</td>
                                    <td>{{ Str::limit($bitacora->descripcion, 50) }}</td>
                                    <td>{{ Str::limit($bitacora->bloqueos, 50) }}</td>
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
