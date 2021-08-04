<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Consultas\Application\Searcher;


use SysGineco\Gineco\Consultas\Application\Responses\ConsultaSearcherResponse;
use SysGineco\Gineco\Consultas\Infrastruture\Persistence\MysqlConsultaWithPacienteRepository;

final class ConsultaSearcher
{
    private $repository;

    public function __construct(
        MysqlConsultaWithPacienteRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function __invoke(ConsultaSearcherRequest $request): ConsultaSearcherResponse
    {
        $result = $this->repository->searcherList($request->filters());

        return (new ConsultaSearcherResponse(
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
