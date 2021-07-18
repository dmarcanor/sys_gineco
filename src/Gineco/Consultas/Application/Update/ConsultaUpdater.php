<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Update;

use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\Services\ConsultaFinder;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaIndicacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaMotivo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaObservacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaReposoMedico;

final class ConsultaUpdater
{
    private $repository;
    private $finder;

    public function __construct(
        ConsultaRepository $repository
    )
    {
        $this->repository = $repository;
        $this->finder = new ConsultaFinder($repository);
    }

    public function __invoke(ConsultaUpdaterRequest $request): void
    {
        $consulta = ($this->finder)(new ConsultaId($request->id()));

        $consulta->updateIndicacion(new ConsultaIndicacion($request->indicacion()));
        $consulta->updateMotivo(new ConsultaMotivo($request->motivo()));
        $consulta->updateReposoMedico(new ConsultaReposoMedico($request->reposoMedico()));
        $consulta->updateObservacion(new ConsultaObservacion($request->observacion()));

        $this->repository->update($consulta);
    }
}
