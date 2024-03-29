<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Application\Find;

final class ConsultaFinderRequest
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }

}
