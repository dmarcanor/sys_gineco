<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Application;

use SysGineco\Gineco\Gestion_citas\Application\GestionCitasCreatorRequest;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEcografia;
use Tests\Unit\Gestion_citas\Domain\GestionCitaCodigoMother;
use Tests\Unit\Gestion_citas\Domain\GestionCitaEcografiaMother;
use Tests\Unit\Gestion_citas\Domain\GestionCitaEstadoMother;
use Tests\Unit\Gestion_citas\Domain\GestionCitaIdMother;
use Tests\Unit\Gestion_citas\Domain\UuidMother;
use Tests\Unit\Shared\Domain\DateTimeMother;

final class GestionCitasCreatorRequestMother
{
    public static function random(): GestionCitasCreatorRequest
    {
        return new GestionCitasCreatorRequest(
            GestionCitaIdMother::random()->value(),
            UuidMother::random(),
            GestionCitaCodigoMother::random()->value(),
            DateTimeMother::random(),
            GestionCitaEstadoMother::random()->value(),
            GestionCitaEcografiaMother::random()->value()
        );
    }

}
