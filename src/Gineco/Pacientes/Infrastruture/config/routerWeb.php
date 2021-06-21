<?php
use Illuminate\Support\Facades\Route;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesPostControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesPutControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/listar', [PacientesControllers::class, 'list'])->name('pacientes.listar');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/crear', [PacientesControllers::class, 'create'])->name('pacientes.crear');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/ver/{id}', [PacientesControllers::class, 'edit'])->name('pacientes.ver');

//peticiones
Route::middleware(['auth:sanctum'])->post('/pacientes/create', PacientesPostControllers::class)->name('pacientes.create');
Route::middleware(['auth:sanctum'])->put('/pacientes/update', PacientesPutControllers::class)->name('pacientes.update');

//peticiones ajax select
Route::get('/pacientes/ajax_get_paciente', [PacientesControllers::class, 'getPacientes']);
