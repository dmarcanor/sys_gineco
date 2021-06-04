<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/pacientes/listar',function () {return Inertia::render('Pacientes/View/List');})->name('pacientes.list');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/listar', function () {
    return Inertia::render('Pacientes/View/List');
})->name('pacientes.list');
