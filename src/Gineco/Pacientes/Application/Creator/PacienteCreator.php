<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Creator;


use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

final class PacienteCreator
{
    public function __construct()
    {
    }

    public function __invoke(PacienteCreatorRequest $request): void
    {
        $paciente = Paciente::create(
            $request->id(),
            $request->nombre(),
            $request->apellido(),
            $request->lugarNacimiento(),
            $request->gradoInstruccion(),
            $request->edad(),
            $request->fechaNacimiento(),
            $request->estadoCivil(),
            $request->motivoConsulta(),
            $request->telefono(),
            $request->dirrecion()
        );

    }

}
