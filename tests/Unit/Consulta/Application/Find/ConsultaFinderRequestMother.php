<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Application\Find;

use SysGineco\Gineco\Consultas\Application\Find\ConsultaFinderRequest;
use Tests\Unit\Shared\Domain\UuidMother;

final class ConsultaFinderRequestMother
{
    public static function random(): ConsultaFinderRequest
    {
        return new ConsultaFinderRequest(
            UuidMother::random()
        );
    }

    public static function create(string $id): ConsultaFinderRequest
    {
        return new ConsultaFinderRequest($id);
    }
}
