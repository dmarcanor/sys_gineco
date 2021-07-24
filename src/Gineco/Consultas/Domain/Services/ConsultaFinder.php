<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Domain\Services;

use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\Exceptions\ConsultaNotExistsException;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;

final class ConsultaFinder
{
    private $repository;

    public function __construct(ConsultaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ConsultaId $id): Consulta
    {
        $consulta = $this->repository->find($id);

        if (null == $consulta) {
            throw new ConsultaNotExistsException($id);
        }

        return $consulta;
    }
}
