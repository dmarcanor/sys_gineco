<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEstado;
use Tests\Unit\Shared\Domain\CodeMother;

final class GestionCitaEstadoMother
{
    public static function create(string $estado): GestionCitaEstado
    {
        return new GestionCitaEstado($estado);
    }

    public static function random(): GestionCitaEstado
    {
        return self::create(
            CodeMother::random()
        );
    }
}
