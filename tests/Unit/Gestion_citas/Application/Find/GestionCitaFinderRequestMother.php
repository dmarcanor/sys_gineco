<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Application\Find;


use SysGineco\Gineco\Gestion_citas\Application\Find\GestionCitaFinderRequest;
use Tests\Unit\Gestion_citas\Domain\UuidMother;

final class GestionCitaFinderRequestMother
{
    public static function random(): GestionCitaFinderRequest
    {
        return new GestionCitaFinderRequest(
            UuidMother::random()
        );
    }

    public static function create(string $id): GestionCitaFinderRequest
    {
        return new GestionCitaFinderRequest($id);
    }

}
