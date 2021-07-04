<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;
use SysGineco\Gineco\Pacientes\Application\Find\PacienteFinder;
use SysGineco\Gineco\Pacientes\Application\Find\PacienteFinderRequest;

final class PacientesControllers extends Controller
{
    public function getPacientes(Request $request)
    {
        $pacientes = DB::table('pacientes')
            ->where(function (Builder $builder) use ($request) {

                if($request->search)
                    $builder->where('pacientes.nombre', 'like', "%{$request->search}%");

            })
            ->select([
                'id',
                'nombre as text',
            ])
            ->get()->toArray();

        return response()->json(['results' => $pacientes], 200);
    }
}
