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

//        ($this->creator)(new PacienteCreatorRequest(
//            (string) !empty($request->id) ? $request->id : '',
//            (string) !empty($request->nombre) ? $request->nombre : '',
//            (string) !empty($request->apellido) ? : '',
//            (string) !empty($request->lugar_nacimiento) ? $request->apellido : '',
//            (string) !empty($request->grado_instruccion) ? $request->grado_instruccion : '',
//            (int) !empty($request->edad) ? $request->edad : 0,
//            (string) !empty($request->fecha_nacimiento) ? $request->fecha_nacimiento : '',
//            (string) !empty($request->estado_civil) ? $request->estado_civil : '',
//            (string) !empty($request->observacion) ? $request->observacion : '',
//            (string) !empty($request->telefono) ? $request->telefono : '',
//            (string) !empty($request->dirrecion) ? $request->dirrecion : ''
//        ));

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
