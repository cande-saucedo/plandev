@extends('layouts.app')

@section('title', 'Listado de Proyectos')

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Proyectos</h2>
                        <a href="{{ route('proyectos.create') }}" class="btn btn-info">Nuevo proyecto</a>
                    </div>   
    
                </div>
                <div class="card-body h-100">

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <br>
                    <form method="GET" class="row g-2 mb-3">
                        <div class="col-md-4">
                            <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control" placeholder="Buscar por nombre...">
                        </div>
                        <div class="col-md-4">
                            <select name="estatus" class="form-select">
                                <option value="">-- Todos los estatus --</option>
                                @foreach(['Planeado', 'En progreso', 'Completado', 'Cancelado'] as $estado)
                                    <option value="{{ $estado }}" {{ request('estatus') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 d-flex gap-2">
                            <button class="btn btn-warning">Filtrar</button>
                            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Limpiar</a>
                        </div>
                    </form>

                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre del proyecto</th>
                                <th>Fecha inicio</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyectos as $proyecto)
                                <tr>
                                    <td>{{ $proyecto->nombre }}</td>
                                    <td>{{ $proyecto->fecha_inicio }}</td>
                                    <td>{{ $proyecto->estatus }}</td>
                                    <td>
                                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-sm btn-success">Editar</a>
                                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este proyecto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $proyectos->links() }}
                    
                </div>
            </div>
        </div>
     </div>    
</div>
@endsection
