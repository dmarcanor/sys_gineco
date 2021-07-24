<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;
use Tests\Unit\Shared\Domain\UuidMother;

final class GestionCitaIdMother
{
    public static function create($id): GestionCitaId
    {
        return new GestionCitaId($id);
    }

    public static function random(): GestionCitaId
    {
        return self::create(UuidMother::random());
    }
}
