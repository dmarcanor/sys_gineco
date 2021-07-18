<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Infrastruture\controllers\ConsultasViewListControllers;

//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/listar', [ConsultasViewListControllers::class, 'execute'])->name('consultas.list');

//peticiones

//peticiones ajax select
