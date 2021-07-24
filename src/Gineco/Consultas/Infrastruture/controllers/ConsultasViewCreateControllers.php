<?php


namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use SysGineco\Gineco\Consultas\Domain\Consulta;

class ConsultasViewCreateControllers extends Controller
{

    public function execute()
    {
        $last_code = DB::table('consultas')
            ->orderBy('id', 'desc')
            ->take(1)
            ->select(['codigo'])
            ->first();

        $newCode = $this->getNewCode($last_code);

        return Inertia::render('Consultas/View/Create', [
            'breadcrumb' => $this->getBreadcrumb(),
            'code' => Consulta::PREFIX . $newCode
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Paciente',
                'link' => true,
                'route' => 'consultas.list'
            ],
            [
                'name' => 'Listar',
                'link' => true,
                'route' => 'consultas.list'
            ],
            [
                'name' => 'Crear',
                'link' => false,
                'route' => ''
            ],
        ];
    }

    private function getNewCode(?\stdClass $last_code): ?int
    {
        $newCode = substr($last_code->codigo, 3);

        return (int)$newCode + 1;
    }
}
