<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Infrastruture\Persistence;

use Illuminate\Support\Facades\DB;
use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;

final class MysqlConsultaRepository implements ConsultaRepository
{

    public function create(Consulta $consulta): void
    {
        DB::table(Consulta::TABLE)
            ->insert([
                'id'            => $consulta->id()->value(),
                'paciente_id'   => $consulta->pacienteId(),
                'codigo'        => $consulta->codigo()->value(),
                'fecha'         => $consulta->fecha()->value(),
                'observaciones' => $consulta->observacion()->value(),
                'indicaciones'  => $consulta->indicacion()->value(),
                'motivo'        => $consulta->motivo()->value(),
                'reposo'        => $consulta->reposoMedico()->value(),
                'created_at'    => $consulta->createdAt()->value(),
                'updated_at'    => $consulta->updatedAt()->value()
            ]);
    }

    public function update(Consulta $consulta): void
    {
        DB::table(Consulta::TABLE)
            ->find($consulta->id()->value())
            ->update([
                'id'            => $consulta->id()->value(),
                'paciente_id'   => $consulta->pacienteId(),
                'codigo'        => $consulta->codigo()->value(),
                'fecha'         => $consulta->fecha()->value(),
                'observaciones' => $consulta->observacion()->value(),
                'indicaciones'  => $consulta->indicacion()->value(),
                'motivo'        => $consulta->motivo()->value(),
                'reposo'        => $consulta->reposoMedico()->value(),
                'created_at'    => $consulta->createdAt()->value(),
                'updated_at'    => $consulta->updatedAt()->value()
            ]);
    }

    public function find(ConsultaId $id): ?Consulta
    {
        $consulta = DB::table(Consulta::TABLE)->find($id->value());

        return empty($consulta)
            ? null
            : Consulta::fromDatabase(
                (string) $consulta->id,
                (string) $consulta->paciente_id,
                (string) $consulta->codigo,
                (string) $consulta->fecha,
                (string) $consulta->observaciones,
                (string) $consulta->indicaciones,
                (string) $consulta->motivo,
                (string) $consulta->reposo,
                (string) $consulta->created_at,
                (string) $consulta->updated_at,
            );
    }
}
