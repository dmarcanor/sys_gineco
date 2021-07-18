<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Create;

use SysGineco\Gineco\Consultas\Application\Create\ConsultaCreatorRequest;
use Tests\Unit\Consulta\Domain\ConsultaCodigoMother;
use Tests\Unit\Consulta\Domain\ConsultaIdMother;
use Tests\Unit\Consulta\Domain\ConsultaIndicacionMother;
use Tests\Unit\Consulta\Domain\ConsultaMotivoMother;
use Tests\Unit\Consulta\Domain\ConsultaObservacionMother;
use Tests\Unit\Consulta\Domain\ConsultaReposoMedicoMother;
use Tests\Unit\Shared\Domain\DateTimeMother;
use Tests\Unit\Shared\Domain\UuidMother;

final class ConsultaCreatorRequestMother
{
    public static function random(): ConsultaCreatorRequest
    {
        return new ConsultaCreatorRequest(
            ConsultaIdMother::random()->value(),
            UuidMother::random(),
            ConsultaCodigoMother::random()->value(),
            DateTimeMother::random(),
            ConsultaObservacionMother::random()->value(),
            ConsultaIndicacionMother::random()->value(),
            ConsultaMotivoMother::random()->value(),
            ConsultaReposoMedicoMother::random()->value()
        );
    }
}
