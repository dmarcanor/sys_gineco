<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Find;

use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Services\ConsultaFinder as Finder;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;

final class ConsultaFinder
{
    private $finder;

    public function __construct(
        ConsultaRepository $repository
    )
    {
        $this->finder = new Finder($repository);
    }

    public function __invoke(ConsultaFinderRequest $request): Consulta
    {
        $id = new ConsultaId($request->id());

        return ($this->finder)($id);
    }
}
