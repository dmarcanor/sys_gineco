<?php


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PacientesViewListControllers extends Controller
{

    public function execute(Request $request)
    {
        $paginate = DB::table('pacientes')
            ->where(function (Builder $builder) use ($request) {
                if($request->nombre)
                    $builder->where('pacientes.nombre', 'like', "%{$request->nombre}%");

                if($request->apellido)
                    $builder->where('pacientes.apellido', 'like', "%{$request->apellido}%");
            })
            ->orderBy('created_at', 'desc')
            ->select([
                'id',
                'nombre',
                'apellido',
                'edad',
                'estado_civil',
                'created_at',
            ])->paginate(10);

        return Inertia::render('Pacientes/View/List', [
            'rows' => $paginate->items(),
            'breadcrumb' => $this->getBreadcrumb(),
            'paginacion' => [
                'total' => $paginate->total(),
                'current_page' => $paginate->currentPage(),
                'last_page' => $paginate->lastPage(),
                'per_page' => $paginate->perPage(),
                'from' => $paginate->currentPage(),
                'to' => $paginate->lastPage(),
            ]
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
