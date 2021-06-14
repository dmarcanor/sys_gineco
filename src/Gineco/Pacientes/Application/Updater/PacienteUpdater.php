<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Updater;


use Illuminate\Http\Request;
use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Domain\Service\PacienteFinder;

final class PacienteUpdater
{
    private $repository;
    private $pacienteFinder;

    public function __construct(
        PacienteRepository $repository,
        PacienteFinder $pacienteFinder
    )
    {
        $this->repository = $repository;
        $this->pacienteFinder = $pacienteFinder;
    }

    public function __invoke(PacienteUpdaterRequest $request)
    {
        $paciente = ($this->pacienteFinder)($request->id());

        $paciente->changeNombre($request->nombre());
        $paciente->changeApellido($request->apellido());
        $paciente->changelugarNacimiento($request->lugarNacimiento());
        $paciente->changeGradoInstruccion($request->gradoInstruccion());
        $paciente->changeEdad($request->edad());
        $paciente->changeFechaNacimiento($request->fechaNacimiento());
        $paciente->changeEstadoCivil($request->estadoCivil());
        $paciente->changeObservacion($request->observacion());
        $paciente->changeTelefono($request->telefono());
        $paciente->changeDireccion($request->direccion());

        $this->repository->update($paciente);
    }

}
