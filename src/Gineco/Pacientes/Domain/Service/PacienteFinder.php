<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Domain\Service;

use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

final class PacienteFinder
{

    private $repository;

    public function __construct(
        PacienteRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(string $id): ?Paciente
    {
        $paciente = $this->repository->find($id);
        return $paciente;
    }

}
