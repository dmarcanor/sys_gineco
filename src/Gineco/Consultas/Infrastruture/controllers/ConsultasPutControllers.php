<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Infrastruture\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SysGineco\Gineco\Consultas\Application\Update\ConsultaUpdater;
use SysGineco\Gineco\Consultas\Application\Update\ConsultaUpdaterRequest;

final class ConsultasPutControllers extends Controller
{
    private $updater;

    public function __construct(
        ConsultaUpdater $updater
    )
    {
        $this->updater = $updater;
    }

    public function __invoke(Request $request)
    {
        $this->validateRequest($request);

        ($this->updater)(new ConsultaUpdaterRequest(
            !empty($request->id) ? (string) $request->id : '',
            !empty($request->observaciones) ? (string) $request->observaciones : '',
            !empty($request->indicaciones) ? (string) $request->indicaciones : '',
            !empty($request->motivo) ? (string) $request->motivo : '',
            !empty($request->reposo) ? (string) $request->reposo : ''
        ));

        return redirect()->route('consultas.list');
    }

    private function validateRequest(Request $request): void
    {
        $request->validate([
            'codigo' => 'required',
            'paciente_id' => 'required',
            'fecha' => 'required'
        ]);
    }
}
