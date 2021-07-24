<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Application\Find;

final class GestionCitaFinderRequest
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
