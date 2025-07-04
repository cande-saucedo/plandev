@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                       <h2>Editar proyecto</h2>
                    </div>   

                </div>
                <div class="card-body h-100">
                    <form action="{{ route('proyectos.update', $proyecto) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion">{{ old('descripcion', $proyecto->descripcion) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_inicio) }}">
                        </div>

                        <div class="mb-3">
                            <label for="estatus" class="form-label">Estatus</label>
                            <select name="estatus" class="form-select">
                                @foreach(['Planeado', 'En progreso', 'Completado', 'Cancelado'] as $estado)
                                    <option value="{{ $estado }}" {{ $proyecto->estatus == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
