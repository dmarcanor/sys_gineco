<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Application\Find\ConsultaFinder;
use SysGineco\Gineco\Consultas\Application\Find\ConsultaFinderRequest;

class ConsultasViewEditControllers extends Controller
{
    private $finder;

    public function __construct(
        ConsultaFinder $finder
    )
    {
        $this->finder = $finder;
    }

    public function execute(string $id)
    {
        $consulta = ($this->finder)(new ConsultaFinderRequest($id));

        return Inertia::render('Consultas/View/Edit', [
            'consulta' => $consulta->toResponse(),
            'breadcrumb' => $this->getBreadcrumb($consulta)
        ]);
    }

    private function getBreadcrumb($object): array
    {
        return [
            [
                'name' => 'Consulta',
                'link' => true,
                'route' => 'consultas.list'
            ],
            [
                'name' => 'Listar',
                'link' => true,
                'route' => 'consultas.list'
            ],
            [
                'name' => 'Ver',
                'link' => false,
                'route' => ''
            ],
        ];
    }
}
