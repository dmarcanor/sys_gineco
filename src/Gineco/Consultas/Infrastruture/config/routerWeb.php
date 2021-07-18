<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasPostControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewListControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/listar', [ConsultasViewListControllers::class, 'execute'])->name('consultas.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/crear', [ConsultasViewListControllers::class, 'execute'])->name('consultas.crear');

//peticiones
Route::middleware(['auth:sanctum'])->post('/pacientes/create', ConsultasPostControllers::class)->name('pacientes.create');

//peticiones ajax select
