<?php
use Illuminate\Support\Facades\Route;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesPostControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesPutControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesViewCreateControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesViewEditControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesViewListControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/listar', [PacientesViewListControllers::class, 'execute'])->name('pacientes.listar');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/crear', [PacientesViewCreateControllers::class, 'execute'])->name('pacientes.crear');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/ver/{id}', [PacientesViewEditControllers::class, 'execute'])->name('pacientes.ver');

//peticiones
Route::middleware(['auth:sanctum'])->post('/pacientes/create', PacientesPostControllers::class)->name('pacientes.create');
Route::middleware(['auth:sanctum'])->put('/pacientes/update', PacientesPutControllers::class)->name('pacientes.update');

//peticiones ajax select
Route::get('/pacientes/ajax_get_paciente', [PacientesControllers::class, 'getPacientes']);
