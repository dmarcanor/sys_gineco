<?php
use Illuminate\Support\Facades\Route;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasPostControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasPutControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewCreateControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewEditControllers;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewListControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/listar', [ConsultasViewListControllers::class, 'execute'])->name('consultas.list');
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/crear', [ConsultasViewCreateControllers::class, 'execute'])->name('consultas.crear');
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/ver/{id}', [ConsultasViewEditControllers::class, 'execute'])->name('consultas.ver');

//peticiones
Route::middleware(['auth:sanctum'])->post('/consultas/create', ConsultasPostControllers::class)->name('consultas.create');
Route::middleware(['auth:sanctum'])->put('/consultas/update', ConsultasPutControllers::class)->name('consultas.update');

//peticiones ajax select
