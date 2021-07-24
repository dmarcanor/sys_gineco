<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ConsultasViewListControllers extends Controller
{

    public function execute(Request $request)
    {
        //@todo: move this logic to an application service.
        $rows = DB::table('consultas')
            ->join('pacientes', 'pacientes.id', '=', 'consultas.paciente_id')
//            ->where(function (Builder $builder) use ($request) {
//                if($request->nombre)
//                    $builder->where('consultas.nombre', 'like', "%{$request->nombre}%");
//
//                if($request->apellido)
//                    $builder->where('pacientes.apellido', 'like', "%{$request->apellido}%");
//            })
            ->orderBy('consultas.created_at', 'desc')
            ->select([
                'consultas.id',
                'consultas.codigo',
                'consultas.paciente_id',
                DB::raw('pacientes.nombre as paciente_nombre'),
                DB::raw('pacientes.apellido as paciente_apellido'),
                'consultas.fecha'
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
