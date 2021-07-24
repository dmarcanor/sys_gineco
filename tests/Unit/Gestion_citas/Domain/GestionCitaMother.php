<?php
declare(strict_types=1);

namespace Tests\Unit\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Application\GestionCitasCreatorRequest;
use SysGineco\Gineco\Gestion_citas\Domain\GestionCita;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaCodigo;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEcografia;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEstado;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;
use Tests\Unit\Shared\Domain\DateTimeMother;

final class GestionCitaMother
{
    public static function create(
        GestionCitaId           $id,
        string                  $pacienteId,
        GestionCitaCodigo       $codigo,
        DateTimeValueObject     $fecha,
        GestionCitaEstado       $estado,
        GestionCitaEcografia    $ecografia
    ): GestionCita
    {
        return GestionCita::create(
            $id,
            $pacienteId,
            $codigo,
            $fecha,
            $estado,
            $ecografia,
        );
    }

    public static function random() : GestionCita
    {
        return self::create(
            GestionCitaIdMother::random(),
            UuidMother::random(),
            GestionCitaCodigoMother::random(),
            new DateTimeValueObject(DateTimeMother::random()),
            GestionCitaEstadoMother::random(),
            GestionCitaEcografiaMother::random()
        );
    }

    public static function fromRequest(GestionCitasCreatorRequest $request): GestionCita
    {
        return self::create(
            GestionCitaIdMother::create($request->id()),
            $request->pacienteId(),
            GestionCitaCodigoMother::create($request->codigo()),
            new DateTimeValueObject($request->fecha()),
            GestionCitaEstadoMother::create($request->estado()),
            GestionCitaEcografiaMother::create($request->ecografia())
        );
    }

}
