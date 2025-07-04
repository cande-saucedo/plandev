@extends('layouts.app_login')

@section('title', 'Iniciar sesión')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h2 class="text-center mb-4">Iniciar sesión</h2>

            {{-- Mensaje de sesión (por ejemplo, "Contraseña restablecida") --}}
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Correo --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger mt-1 small">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Recordarme --}}
                <!--<div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Recuérdame</label>
                </div>-->

                {{-- Acciones --}}
                <!--<div class="d-flex justify-content-between align-items-center mb-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none small">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>-->

                <button type="submit" class="btn btn-info w-100">
                    Acceder
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
