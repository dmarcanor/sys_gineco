<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Application\Find;

use SysGineco\Gineco\Gestion_citas\Domain\Contracts\GestionCitaRepository;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use \SysGineco\Gineco\Gestion_citas\Domain\Services\GestionCitaFinder as Finder;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;


final class GestionCitaFinder
{
    private $finder;

    public function __construct(
        GestionCitaRepository $repository
    )
    {
        $this->finder = new Finder($repository);
    }

    public function __invoke(GestionCitaFinderRequest $request): GestionCita
    {
        $id = new GestionCitaId($request->id());

        return ($this->finder)($id);
    }
}
