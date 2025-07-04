@extends('layouts.app')

@section('title', 'Nueva Tarea')

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                         <h2>Crear Nueva Tarea</h2>
                    </div>   

                </div>
                <div class="card-body h-100">
                    <form action="{{ route('tareas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Proyecto</label>
                            <select name="proyecto_id" class="form-select" required>
                                <option value="">-- Selecciona un proyecto --</option>
                                @foreach($proyectos as $proyecto)
                                    <option value="{{ $proyecto->id }}" {{ old('proyecto_id') == $proyecto->id ? 'selected' : '' }}>
                                        {{ $proyecto->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Título de la tarea</label>
                            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Asignado a</label>
                            <select name="asignado_a" class="form-select" required>
                                <option value="">-- Selecciona un desarrollador --</option>
                                @foreach($desarrolladores as $dev)
                                    <option value="{{ $dev->id }}" {{ old('asignado_a') == $dev->id ? 'selected' : '' }}>
                                        {{ $dev->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha límite</label>
                            <input type="date" name="fecha_limite" class="form-control" value="{{ old('fecha_limite') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prioridad</label>
                            <select name="prioridad" class="form-select" required>
                                @foreach(['Alta', 'Media', 'Baja'] as $nivel)
                                    <option value="{{ $nivel }}" {{ old('prioridad', $tarea->prioridad ?? 'Media') == $nivel ? 'selected' : '' }}>
                                        {{ $nivel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Estatus</label>
                            <select name="estatus" class="form-select" required>
                                @foreach(['Pendiente', 'En proceso', 'Completada'] as $estado)
                                    <option value="{{ $estado }}" {{ old('estatus') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

    
</div>
@endsection
