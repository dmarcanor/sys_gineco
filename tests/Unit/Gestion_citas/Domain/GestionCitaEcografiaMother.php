<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEcografia;
use Tests\Unit\Shared\Domain\WordMother;

final class GestionCitaEcografiaMother
{
    public static function create(string $ecografia):  GestionCitaEcografia
    {
        return new GestionCitaEcografia($ecografia);
    }

    public static function random(): GestionCitaEcografia
    {
        return self::create(
          WordMother ::random()
        );
    }


}
