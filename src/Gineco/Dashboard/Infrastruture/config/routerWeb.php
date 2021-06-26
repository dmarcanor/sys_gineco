<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::middleware(['auth:sanctum', 'verified'])->group(function () {
//    Route::get('/',function () {return Inertia::render('Dashboard');});
//    Route::get('/dashboard',function () {return Inertia::render('Dashboard');})->name('dashboard');
//});

$breadcrumd = [
    [
        'name' => 'Dashboard',
        'link' => false,
        'route' => ''
    ]
];

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () use ($breadcrumd) {return Inertia::render('Dashboard/Dashboard', ['breadcrumb' => $breadcrumd]);});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () use ($breadcrumd) {return Inertia::render('Dashboard/Dashboard', ['breadcrumb' => $breadcrumd]);})->name('dashboard');

