<?php


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PacientesViewCreateControllers extends Controller
{

    public function execute()
    {
        return Inertia::render('Pacientes/View/Create', [
            'breadcrumb' => $this->getBreadcrumb()
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Paciente',
                'link' => true,
                'route' => 'pacientes.listar'
            ],
            [
                'name' => 'Listar',
                'link' => true,
                'route' => 'pacientes.listar'
            ],
            [
                'name' => 'Crear',
                'link' => false,
                'route' => ''
            ],
        ];
    }
}
