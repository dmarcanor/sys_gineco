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
    private $finder;

    public function __construct(
        PacienteFinder $finder
    )
    {
        $this->finder = $finder;
    }

    public function create()
    {
        return Inertia::render('Pacientes/View/Create');
    }
    public function ver(string $id)
    {
        $paciente = ($this->finder)(new PacienteFinderRequest($id));

        return Inertia::render('Pacientes/View/Edit', [
            'paciente' => $paciente
        ]);
    }

    public function list(Request $request)
    {
        $pacientes = DB::table('pacientes')
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
                'created_at',
            ])->get();

        return Inertia::render('Pacientes/View/List', [
            'pacientes' => $pacientes
        ]);
    }
}
