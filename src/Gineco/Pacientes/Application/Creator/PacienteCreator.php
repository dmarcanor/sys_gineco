<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Creator;


use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

final class PacienteCreator
{
    private $repository;

    public function __construct(
        PacienteRepository $repository
    )
    {
        $this->repository = $repository;
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
            $request->observacion(),
            $request->telefono(),
            $request->direccion()
        );

        $this->repository->create($paciente);
    }

}
