<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaReposoMedico;
use Tests\Unit\Shared\Domain\LongTextMother;

final class ConsultaReposoMedicoMother
{
    public static function create(string $reposoMedico): ConsultaReposoMedico
    {
        return new ConsultaReposoMedico($reposoMedico);
    }

    public static function random(): ConsultaReposoMedico
    {
        return self::create(
            LongTextMother::random()
        );
    }
}
