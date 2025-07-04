@extends('layouts.app')

@section('title', 'Registrar Bitácora Diaria')

@section('content')
<div class="container mt-4">

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">

                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Bitácora Diaria</h2>
                    </div>   

                </div>
                <div class="card-body h-100">
                    <form method="POST" action="{{ route('bitacora-diaria.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" value="{{ now()->toDateString() }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tarea (opcional)</label>
                            <select name="tarea_id" class="form-select">
                                <option value="">-- Selecciona tarea --</option>
                                @foreach(\App\Models\Tarea::orderBy('titulo')->get() as $tarea)
                                    <option value="{{ $tarea->id }}">{{ $tarea->titulo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción del trabajo realizado</label>
                            <textarea name="descripcion" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comentarios</label>
                            <textarea name="bloqueos" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('bitacora-diaria.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>
@endsection
