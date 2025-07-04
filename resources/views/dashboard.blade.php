@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="h3 mb-3">Dashboard</h1>

    <div class="row">
        <!-- Proyectos -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Proyectos</h5>
                        <h2 class="mb-0">{{ $totalProyectos }}</h2>
                    </div>
                    <i data-feather="folder" class="feather-lg"></i>
                </div>
            </div>
        </div>

        <!-- Tareas activas -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Tareas activas</h5>
                        <h2 class="mb-0">{{ $tareasActivas }}</h2>
                    </div>
                    <i data-feather="check-circle" class="feather-lg"></i>
                </div>
            </div>
        </div>

        <!-- Bitácoras hoy -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Bitácoras hoy</h5>
                        <h2 class="mb-0">{{ $bitacorasHoy }}</h2>
                    </div>
                    <i data-feather="book-open" class="feather-lg"></i>
                </div>
            </div>
        </div>

        <!-- Usuarios -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">Usuarios</h5>
                        <h2 class="mb-0">{{ $usuarios }}</h2>
                    </div>
                    <i data-feather="users" class="feather-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tareas por Prioridad</h5>
                </div>
                <div class="card-body">
                    <canvas id="tareasPrioridadChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Proyectos por Estatus</h5>
                </div>
                <div class="card-body">
                    <canvas id="proyectosPorEstatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tareas por Estatus</h5>
            </div>
            <div class="card-body">
                <canvas id="tareasPorEstatusChart" height="100px"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const canvas = document.getElementById('tareasPrioridadChart');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const tareasPrioridadChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($tareasPorPrioridad->keys()) !!},
                datasets: [{
                    label: 'Cantidad de tareas',
                    data: {!! json_encode($tareasPorPrioridad->values()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(54, 162, 235, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('proyectosPorEstatusChart');
        if (!ctx) return;

        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($proyectosPorEstatus->keys()) !!},
                datasets: [{
                    label: 'Proyectos',
                    data: {!! json_encode($proyectosPorEstatus->values()) !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: false
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const tareasChart = document.getElementById('tareasPorEstatusChart');
        if (!tareasChart) return;

        new Chart(tareasChart, {
            type: 'bar',
            data: {
                labels: {!! json_encode($tareasPorEstatus->keys()) !!},
                datasets: [{
                    label: 'Cantidad de tareas',
                    data: {!! json_encode($tareasPorEstatus->values()) !!},
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.7)',   // Pendiente
                        'rgba(54, 162, 235, 0.7)',   // En progreso
                        'rgba(75, 192, 192, 0.7)'    // Completada
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>


