<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\BitacoraDiariaController;
use App\Http\Controllers\DashboardController;
use App\Exports\ProyectosExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');*/

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('proyectos', ProyectoController::class)->middleware('auth');
    Route::resource('tareas', TareaController::class)->middleware('auth');

    Route::resource('bitacora-diaria', BitacoraDiariaController::class)->middleware('auth');

    /*Route::get('/proyectos/exportar', function () {
        return Excel::download(new ProyectosExport, 'proyectos.xlsx');
    })->middleware('auth')->name('proyectos.exportar');*/

    /*Route::prefix('proyectos/{proyecto}')->middleware('auth')->group(function () {
        Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');
        Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');
        Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::put('tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
        Route::delete('tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    });*/

});

require __DIR__.'/auth.php';
