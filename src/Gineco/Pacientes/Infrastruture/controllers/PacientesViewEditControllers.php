<?php


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use SysGineco\Gineco\Pacientes\Application\Find\PacienteFinder;
use SysGineco\Gineco\Pacientes\Application\Find\PacienteFinderRequest;

class PacientesViewEditControllers extends Controller
{
    private $finder;

    public function __construct(
        PacienteFinder $finder
    )
    {
        $this->finder = $finder;
    }

    public function execute(string $id)
    {
        $paciente = ($this->finder)(new PacienteFinderRequest($id));

        return Inertia::render('Pacientes/View/Edit', [
            'paciente' => $paciente,
            'breadcrumb' => $this->getBreadcrumb($paciente)
        ]);
    }

    private function getBreadcrumb($object): array
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
                'name' => 'Ver',
                'link' => false,
                'route' => ''
            ],
        ];
    }
}
