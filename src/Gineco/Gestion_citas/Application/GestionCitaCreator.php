<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Application;

use SysGineco\Gineco\Gestion_citas\Domain\Contracts\GestionCitaRepository;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaCodigo;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEcografia;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEstado;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;

final class GestionCitaCreator
{
    private $repository;

    public function __construct(GestionCitaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GestionCitasCreatorRequest $request): void
    {
        $gestionCita = GestionCita::create(
            new GestionCitaId($request->id()),
            $request->pacienteId(),
            new GestionCitaCodigo($request->codigo()),
            new DateTimeValueObject($request->fecha()),
            new GestionCitaEstado($request->estado()),
            new GestionCitaEcografia($request->ecografia())
        );

        $this->repository->create($gestionCita);
    }
}
