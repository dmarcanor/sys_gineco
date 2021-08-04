<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Shared\Application\Searcher;

class SearcherRequest
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
