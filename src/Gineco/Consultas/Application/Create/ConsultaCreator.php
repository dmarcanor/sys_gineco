<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Create;

use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaCodigo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaIndicacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaMotivo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaObservacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaReposoMedico;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;

final class ConsultaCreator
{
    private $repository;

    public function __construct(ConsultaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ConsultaCreatorRequest $request): void
    {
        $consulta = Consulta::create(
            new ConsultaId($request->id()),
            new ConsultaCodigo($request->codigo()),
            new DateTimeValueObject($request->fecha()),
            new ConsultaObservacion($request->observacion()),
            new ConsultaIndicacion($request->indicacion()),
            new ConsultaMotivo($request->motivo()),
            new ConsultaReposoMedico($request->reposoMedico())
        );

        $this->repository->create($consulta);
    }
}
