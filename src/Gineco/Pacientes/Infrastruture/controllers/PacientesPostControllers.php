<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Infrastruture\controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SysGineco\Gineco\Pacientes\Application\Creator\PacienteCreator;
use SysGineco\Gineco\Pacientes\Application\Creator\PacienteCreatorRequest;

final class PacientesPostControllers extends Controller
{
    private $creator;

    public function __construct(PacienteCreator $creator)
    {
        $this->creator = $creator;
    }

    public function save(Request $request)
    {
        $this->validateRequest($request);

        ($this->creator)(new PacienteCreatorRequest(
             !empty($request->id) ? (string) $request->id : '',
            !empty($request->nombre) ? (string) $request->nombre : '',
             !empty($request->apellido) ? (string) $request->apellido : '',
             !empty($request->lugar_nacimiento) ? (string) $request->apellido : '',
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
