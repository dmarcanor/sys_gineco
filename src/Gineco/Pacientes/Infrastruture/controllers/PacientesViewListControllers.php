<?php


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use SysGineco\Gineco\Pacientes\Application\Searcher\PacientesSearcher;
use SysGineco\Gineco\Pacientes\Application\Searcher\PacientesSearcherRequest;

class PacientesViewListControllers extends Controller
{
    private $searcher;

    public function __construct(
        PacientesSearcher $searcher
    )
    {
        $this->searcher = $searcher;
    }

    public function execute(Request $request)
    {
        $response = ($this->searcher)(new PacientesSearcherRequest(
            $request->all()
        ));

        return Inertia::render('Pacientes/View/List', [
            'rows' => $response->rows(),
            'paginacion' => $response->paginacion(),
            'breadcrumb' => $this->getBreadcrumb(),
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Paciente',
                'link' => false,
                'route' => ''
            ],
            [
                'name' => 'Listar',
                'link' => false,
                'route' => 'pacientes.listar'
            ],
        ];
    }
}
