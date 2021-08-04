<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Application\Searcher\ConsultaSearcher;
use SysGineco\Gineco\Consultas\Application\Searcher\ConsultaSearcherRequest;

class ConsultasViewListControllers extends Controller
{
    private $searcher;

    public function __construct(ConsultaSearcher $searcher)
    {
        $this->searcher = $searcher;
    }


    public function execute(Request $request)
    {
        $response = ($this->searcher)(new ConsultaSearcherRequest(
            $request->all()
        ));

        return Inertia::render('Consultas/View/List', [
            'rows' => $response->rows(),
            'paginacion' => $response->paginacion(),
            'breadcrumb' => $this->getBreadcrumb()
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Consulta',
                'link' => false,
                'route' => ''
            ],
            [
                'name' => 'Listar',
                'link' => false,
                'route' => 'consultas.list'
            ],
        ];
    }
}
