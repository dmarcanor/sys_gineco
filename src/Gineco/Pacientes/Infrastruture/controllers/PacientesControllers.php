<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

final class PacientesControllers extends Controller
{
    public function create()
    {
        return Inertia::render('Pacientes/View/Create');
    }

    public function list()
    {
        return Inertia::render('Pacientes/View/List');
    }
}
