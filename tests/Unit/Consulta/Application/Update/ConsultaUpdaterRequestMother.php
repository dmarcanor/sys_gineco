<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Update;

use SysGineco\Gineco\Consultas\Application\Update\ConsultaUpdaterRequest;
use Tests\Unit\Consulta\Domain\ConsultaIndicacionMother;
use Tests\Unit\Consulta\Domain\ConsultaMotivoMother;
use Tests\Unit\Consulta\Domain\ConsultaObservacionMother;
use Tests\Unit\Consulta\Domain\ConsultaReposoMedicoMother;

final class ConsultaUpdaterRequestMother
{
    public static function create(
        string $id,
        ?string $observacion,
        ?string $indicacion,
        ?string $motivo,
        ?string $reposoMedico
    ): ConsultaUpdaterRequest
    {
        return new ConsultaUpdaterRequest(
            $id,
            $observacion,
            $indicacion,
            $motivo,
            $reposoMedico
        );
    }

    public static function withId(string $id): ConsultaUpdaterRequest
    {
        return self::create(
            $id,
            ConsultaObservacionMother::random()->value(),
            ConsultaIndicacionMother::random()->value(),
            ConsultaMotivoMother::random()->value(),
            ConsultaReposoMedicoMother::random()->value()
        );
    }
}
