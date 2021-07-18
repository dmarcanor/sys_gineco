<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Application\Searcher;

final class PacientesSearcherRequest
{
    private $page;
    private $filters;

    public function __construct(
        array $filters
    )
    {
        $this->filters = $filters;
    }

    public function filters(): array
    {
        return $this->filters;
    }
}
