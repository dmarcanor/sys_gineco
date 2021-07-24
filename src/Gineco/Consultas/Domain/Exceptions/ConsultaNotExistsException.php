<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Domain\Exceptions;

final class ConsultaNotExistsException extends \Exception
{

    public function __construct(\SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId $id)
    {
        parent::__construct("La consulta {$id->value()} no existe");
    }
}
