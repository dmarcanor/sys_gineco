<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaCodigo;
use Tests\Unit\Shared\Domain\CodeMother;

final class GestionCitaCodigoMother
{

    public static function create( string $codigo): GestionCitaCodigo
    {
        return new GestionCitaCodigo($codigo);
    }

    public static function random(): GestionCitaCodigo
    {
        return self::create(
            CodeMother::random()
        );
    }

}
