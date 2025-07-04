@extends('layouts.app')

@section('title', 'Nuevo Proyecto')

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                       <h2>Registrar nuevo proyecto</h2>
                    </div>   
                </div>
                <div class="card-body h-100">
                    <form action="{{ route('proyectos.store') }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del proyecto</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="5">{{ old('descripcion') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                            <input type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}">
                        </div>

                        <div class="mb-3">
                            <label for="estatus" class="form-label">Estatus</label>
                            <select name="estatus" class="form-select">
                                <option>Planeado</option>
                                <option>En progreso</option>
                                <option>Completado</option>
                                <option>Cancelado</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
