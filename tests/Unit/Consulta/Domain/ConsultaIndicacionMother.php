<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaIndicacion;
use Tests\Unit\Shared\Domain\LongTextMother;

final class ConsultaIndicacionMother
{
    public static function create(string $indiciacion): ConsultaIndicacion
    {
        return new ConsultaIndicacion($indiciacion);
    }

    public static function random(): ConsultaIndicacion
    {
        return self::create(
            LongTextMother::random()
        );
    }
}
