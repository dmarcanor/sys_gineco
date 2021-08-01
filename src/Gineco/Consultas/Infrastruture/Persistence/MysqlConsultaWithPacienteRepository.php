<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Infrastruture\Persistence;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use SysGineco\Gineco\Consultas\Domain\Consulta;
use SysGineco\Gineco\Consultas\Domain\Contracts\ConsultaRepository;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;

final class MysqlConsultaWithPacienteRepository
{
    public function searcherList(array $clause)
    {
        $query = DB::table(Consulta::TABLE)
            ->join('pacientes', 'pacientes.id', '=', 'consultas.paciente_id')
            ->where(function (Builder $builder) use($clause) {
                (new MysqlConsultaFilters())->apply($builder, $clause);
            })
            ->select([
                'consultas.id',
                'consultas.codigo',
                'consultas.paciente_id',
                DB::raw('pacientes.nombre as paciente_nombre'),
                DB::raw('pacientes.apellido as paciente_apellido'),
                'consultas.fecha'
            ]);

        return $query->paginate(10);
    }
}
