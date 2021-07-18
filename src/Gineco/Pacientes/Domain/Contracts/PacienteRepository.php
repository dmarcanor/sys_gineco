<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Domain\Contracts;

use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

interface PacienteRepository
{
    public function create(Paciente $paciente): void;
    public function update(Paciente $paciente): void;
    public function find(string $id): ?Paciente;
    public function searcherList(array $clause);
}
