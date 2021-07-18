<?php


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
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
            $request->all(),
        ));

//        $paginate = DB::table('pacientes')
//            ->where(function (Builder $builder) use ($request) {
//                if($request->nombre)
//                    $builder->where('pacientes.nombre', 'like', "%{$request->nombre}%");
//
//                if($request->apellido)
//                    $builder->where('pacientes.apellido', 'like', "%{$request->apellido}%");
//            })
//            ->orderBy('created_at', 'desc')
//            ->select([
//                'id',
//                'nombre',
//                'apellido',
//                'edad',
//                'estado_civil',
//                'created_at',
//            ])->paginate(10);

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
