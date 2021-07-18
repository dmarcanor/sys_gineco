<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Searcher;


use SysGineco\Gineco\Pacientes\Application\Responses\PacientesSearcherResponse;
use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;

final class PacientesSearcher
{
    private $repository;

    public function __construct(
        PacienteRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(PacientesSearcherRequest $request): PacientesSearcherResponse
    {
        $result = $this->repository->searcherList($request->filters());

        return (new PacientesSearcherResponse(
            $result->items(),
            [
                'total' => $result->total(),
                'current_page' => $result->currentPage(),
                'last_page' => $result->lastPage(),
                'per_page' => $result->perPage(),
                'from' => $result->currentPage(),
                'to' => $result->lastPage(),
            ]
        ));
    }
}
