<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/citas/listar',function () {return Inertia::render('Citas/View/List');})->name('citas.list');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/citas/listar', function () {
    return Inertia::render('Citas/View/List');
})->name('citas.list');
