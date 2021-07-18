<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;
use Tests\Unit\Shared\Domain\UuidMother;

final class ConsultaIdMother
{
    public static function create(string $id): ConsultaId
    {
        return new ConsultaId($id);
    }

    public static function random(): ConsultaId
    {
        return self::create(
            UuidMother::random()
        );
    }
}
