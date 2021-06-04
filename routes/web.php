<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {return Inertia::render('Dashboard');});
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/pacientes/listar', function () {
//    return Inertia::render('Pacientes/View/List');
//})->name('pacientes.list');
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/expedientes/listar', function () {
//    return Inertia::render('Expedientes/View/List');
//})->name('expedientes.list');
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/citas/listar', function () {
//    return Inertia::render('Citas/View/List');
//})->name('citas.list');
