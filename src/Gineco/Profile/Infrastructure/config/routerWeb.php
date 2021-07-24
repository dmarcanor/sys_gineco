<?php
use Illuminate\Support\Facades\Route;
use SysGineco\Gineco\Profile\Infrastructure\controllers\ProfileViewEditControllers;


//vistas
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [ProfileViewEditControllers::class, 'execute'])->name('profile');
