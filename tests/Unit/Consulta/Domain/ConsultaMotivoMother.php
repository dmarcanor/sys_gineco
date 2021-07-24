<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaMotivo;
use Tests\Unit\Shared\Domain\LongTextMother;

final class ConsultaMotivoMother
{
    public static function create(string $motivo): ConsultaMotivo
    {
        return new ConsultaMotivo($motivo);
    }

    public static function random(): ConsultaMotivo
    {
        return self::create(
            LongTextMother::random()
        );
    }
}
