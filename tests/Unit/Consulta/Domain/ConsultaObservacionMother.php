<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaObservacion;
use Tests\Unit\Shared\Domain\LongTextMother;

final class ConsultaObservacionMother
{
    public static function create(string $observacion): ConsultaObservacion
    {
        return new ConsultaObservacion($observacion);
    }

    public static function random(): ConsultaObservacion
    {
        return self::create(
            LongTextMother::random()
        );
    }
}
