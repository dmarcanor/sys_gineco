<?php
use Illuminate\Support\Facades\Route;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesControllers;
use SysGineco\Gineco\Pacientes\Infrastruture\controllers\PacientesPostControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/listar', [PacientesControllers::class, 'list'])->name('pacientes.listar');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/crear', [PacientesControllers::class, 'create'])->name('pacientes.crear');
Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/ver/{id}', [PacientesControllers::class, 'ver'])->name('pacientes.ver');

//peticiones
Route::middleware(['auth:sanctum'])->post('/pacientes/create', [PacientesPostControllers::class, 'save'])->name('pacientes.create');

