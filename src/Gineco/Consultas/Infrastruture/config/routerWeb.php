<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/expedientes/listar',function () {return Inertia::render('Expedientes/View/List');})->name('expedientes.list');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/consultas/listar', function () {
    return Inertia::render('Consultas/View/List');
})->name('consultas.list');
