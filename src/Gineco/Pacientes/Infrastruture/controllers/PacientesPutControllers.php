<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SysGineco\Gineco\Pacientes\Application\Updater\PacienteUpdater;
use SysGineco\Gineco\Pacientes\Application\Updater\PacienteUpdaterRequest;

final class PacientesPutControllers extends Controller
{
    private $updater;

    public function __construct(
        PacienteUpdater $updater
    )
    {
        $this->updater = $updater;
    }

    public function __invoke(Request $request)
    {
        $this->validateRequest($request);

        ($this->updater)(new PacienteUpdaterRequest(
            !empty($request->id) ? (string) $request->id : '',
            !empty($request->nombre) ? (string) $request->nombre : '',
            !empty($request->apellido) ? (string) $request->apellido : '',
            !empty($request->lugar_nacimiento) ? (string) $request->lugar_nacimiento : '',
            !empty($request->grado_instruccion) ? (string) $request->grado_instruccion : '',
            !empty($request->edad) ? (int) $request->edad : 0,
            !empty($request->fecha_nacimiento) ? (string) $request->fecha_nacimiento : '',
            !empty($request->estado_civil) ? (string) $request->estado_civil : '',
            !empty($request->observacion) ? (string) $request->observacion : '',
            !empty($request->telefono) ? (string) $request->telefono : '',
            !empty($request->direccion) ? (string) $request->direccion : ''
        ));

        return redirect()->route('pacientes.listar');
    }

    private function validateRequest(Request $request): void
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required'
        ]);
    }
}
