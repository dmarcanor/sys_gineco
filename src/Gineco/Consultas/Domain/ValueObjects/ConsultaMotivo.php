<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Domain\ValueObjects;

use SysGineco\Gineco\Shared\Domain\ValueObjects\StringValueObject;

final class ConsultaMotivo extends StringValueObject
{
    private $exceptionMessage = "El motivo de la consulta no puede estar vacío";
    private $exceptionCode = 400;

    public function __construct(string $value)
    {
        $this->notEmpty($value);

        parent::__construct($value);
    }
}
