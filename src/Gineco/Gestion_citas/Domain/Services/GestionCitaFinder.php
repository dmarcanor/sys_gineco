<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Domain\Services;

use SysGineco\Gineco\Gestion_citas\Domain\Contracts\GestionCitaRepository;
use SysGineco\Gineco\Gestion_citas\Domain\Exceptions\GestionCitaDoesNotExistException;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;

final class GestionCitaFinder
{
    private $repository;

    public function __construct(
        GestionCitaRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(GestionCitaId $id): GestionCita
    {
       $gestion_cita = $this->repository->find($id);

       if ( null === $gestion_cita)
           throw new GestionCitaDoesNotExistException($id);


       return $gestion_cita;
    }

}
