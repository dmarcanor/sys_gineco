<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaCodigo;
use Tests\Unit\Shared\Domain\CodeMother;

final class ConsultaCodigoMother
{
    public static function create(string $codigo): ConsultaCodigo
    {
        return new ConsultaCodigo($codigo);
    }

    public static function random(): ConsultaCodigo
    {
        return self::create(
            CodeMother::random()
        );
    }
}
