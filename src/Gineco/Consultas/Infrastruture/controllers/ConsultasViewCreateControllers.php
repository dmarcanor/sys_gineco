<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ConsultasViewCreateControllers extends Controller
{

    public function execute()
    {
        return Inertia::render('Consultas/View/Create', [
            'breadcrumb' => $this->getBreadcrumb()
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Paciente',
                'link' => true,
                'route' => 'consultas.listar'
            ],
            [
                'name' => 'Listar',
                'link' => true,
                'route' => 'consultas.listar'
            ],
            [
                'name' => 'Crear',
                'link' => false,
                'route' => ''
            ],
        ];
    }
}
