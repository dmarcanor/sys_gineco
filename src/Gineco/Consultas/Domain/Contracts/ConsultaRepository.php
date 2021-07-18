<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Domain\Contracts;

use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;

interface ConsultaRepository
{
    public function create(Consulta $consulta): void;

    public function update(Consulta $consulta): void;

    public function find(ConsultaId $id): ?Consulta;
}
