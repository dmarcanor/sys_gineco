<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ConsultasViewListControllers extends Controller
{

    public function execute(Request $request)
    {
        $rows = DB::table('consultas')
//            ->where(function (Builder $builder) use ($request) {
//                if($request->nombre)
//                    $builder->where('consultas.nombre', 'like', "%{$request->nombre}%");
//
//                if($request->apellido)
//                    $builder->where('pacientes.apellido', 'like', "%{$request->apellido}%");
//            })
            ->orderBy('created_at', 'desc')
            ->select([
                'id',
                'codigo',
                'paciente_id',
                'fecha'
            ])->get();

        return Inertia::render('Consultas/View/List', [
            'rows' => $rows,
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
