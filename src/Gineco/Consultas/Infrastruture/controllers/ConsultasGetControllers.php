<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use SysGineco\Gineco\Consultas\Application\Searcher\ConsultaSearcher;
use SysGineco\Gineco\Consultas\Application\Searcher\ConsultaSearcherRequest;

final class ConsultasGetControllers
{
    private $searcher;

    public function __construct(ConsultaSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(Request $request): JsonResponse
    {
        $filters = $this->getFilters($request);
        $consultas = ($this->searcher)(new ConsultaSearcherRequest($filters));

        return new JsonResponse($consultas, 200);
    }

    private function getFilters(Request $request): array
    {
        if (empty($request->all()))
            return [];

        return [
            'codigo'        => !empty($request->codigo) ? (string) $request->codigo : '',
            'fecha_desde'   => !empty($request->fecha_desde) ? (string) $request->fecha_desde : '',
            'fecha_hasta'   => !empty($request->fecha_hasta) ? (string) $request->fecha_hasta : '',
            'paciente_id'   => !empty($request->paciente_id) ? (string) $request->paciente_id : '',
        ];
    }
}
