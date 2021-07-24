<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Domain\Exceptions;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;

final class GestionCitaDoesNotExistException extends \Exception
{

    public function __construct(GestionCitaId $id)
    {
        parent::__construct("La gestión de cita {$id->value()} no existe");
    }
}
