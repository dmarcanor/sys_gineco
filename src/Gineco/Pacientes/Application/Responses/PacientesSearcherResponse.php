<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Responses;


final class PacientesSearcherResponse
{
    private $rows;
    private $paginacion;

    public function __construct(
        array $rows,
        array $paginacion
    )
    {
        $this->rows = $rows;
        $this->paginacion = $paginacion;
    }

    public function rows(): array
    {
        return $this->rows;
    }

    public function paginacion(): array
    {
        return $this->paginacion;
    }
}
