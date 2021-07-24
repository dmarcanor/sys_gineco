<?php

declare(strict_types=1);

namespace Tests\Unit\Consulta\Domain;

use SysGineco\Gineco\Consultas\Application\Create\ConsultaCreatorRequest;
use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaCodigo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaIndicacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaMotivo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaObservacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaReposoMedico;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;
use Tests\Unit\Shared\Domain\DateTimeMother;
use Tests\Unit\Shared\Domain\UuidMother;

final class ConsultaMother
{
    public static function create(
        ConsultaId $id,
        string $pacienteId,
        ConsultaCodigo $codigo,
        DateTimeValueObject $fecha,
        ConsultaObservacion $observacion,
        ConsultaIndicacion $indicacion,
        ConsultaMotivo $motivo,
        ConsultaReposoMedico $reposoMedico
    ): Consulta
    {
        return Consulta::create(
            $id,
            $pacienteId,
            $codigo,
            $fecha,
            $observacion,
            $indicacion,
            $motivo,
            $reposoMedico
        );
    }

    public static function random(): Consulta
    {
        return self::create(
            ConsultaIdMother::random(),
            UuidMother::random(),
            ConsultaCodigoMother::random(),
            new DateTimeValueObject(DateTimeMother::random()),
            ConsultaObservacionMother::random(),
            ConsultaIndicacionMother::random(),
            ConsultaMotivoMother::random(),
            ConsultaReposoMedicoMother::random()
        );
    }

    public static function fromRequest(ConsultaCreatorRequest $request): Consulta
    {
        return self::create(
            ConsultaIdMother::create($request->id()),
            $request->pacienteId(),
            ConsultaCodigoMother::create($request->codigo()),
            new DateTimeValueObject($request->fecha()),
            ConsultaObservacionMother::create($request->observacion()),
            ConsultaIndicacionMother::create($request->indicacion()),
            ConsultaMotivoMother::create($request->motivo()),
            ConsultaReposoMedicoMother::create($request->reposoMedico())
        );
    }
}
