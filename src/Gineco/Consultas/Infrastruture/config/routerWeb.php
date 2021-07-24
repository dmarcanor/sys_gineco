<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasPostControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewCreateControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewListControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/listar', [ConsultasViewListControllers::class, 'execute'])->name('consultas.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/crear', [ConsultasViewCreateControllers::class, 'execute'])->name('consultas.crear');

//peticiones
Route::middleware(['auth:sanctum'])->post('/consultas/create', ConsultasPostControllers::class)->name('consultas.create');

//peticiones ajax select
