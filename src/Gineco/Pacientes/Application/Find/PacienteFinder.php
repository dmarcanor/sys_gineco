<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Find;

use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;
use SysGineco\Gineco\Pacientes\Domain\Service\PacienteFinder as PacienteFind;

final class PacienteFinder
{

    private $finder;

    public function __construct(
        PacienteFind $finder
    )
    {
        $this->finder = $finder;
    }

    public function __invoke(PacienteFinderRequest $request): array
    {
        $paciente = ($this->finder)($request->id());
        return empty($paciente) ? [] : [
        'id' => $paciente->id(),
        'nombre' => $paciente->nombre(),
        'apellido' => $paciente->apellido(),
        'lugar_nacimiento' => $paciente->lugarNacimiento(),
        'grado_instruccion' => $paciente->gradoInstruccion(),
        'edad' => $paciente->edad(),
        'fecha_nacimiento' => $paciente->fechaNacimiento()->format('Y-m-d'),
        'estado_civil' => $paciente->estadoCivil(),
        'observacion' => $paciente->observacion(),
        'telefono' => $paciente->telefono(),
        'direccion' => $paciente->direccion()
    ];
    }
}
