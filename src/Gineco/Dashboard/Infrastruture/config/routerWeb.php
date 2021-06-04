<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/',function () {return Inertia::render('Dashboard');});
//    Route::get('/dashboard',function () {return Inertia::render('Dashboard');})->name('dashboard');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {return Inertia::render('Dashboard');});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return Inertia::render('Dashboard');})->name('dashboard');

