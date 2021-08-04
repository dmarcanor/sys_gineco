<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Infrastruture\Persistence;

use SysGineco\Gineco\Shared\Infrastructure\Persistence\MysqlQueryFilters;

final class MysqlConsultaFilters extends MysqlQueryFilters
{
    public function codigo($value): void
    {
        $this->builder->where('consultas.codigo', 'like', "%{$value}%");
    }

    public function fecha_desde($value): void
    {
        $this->builder->where('consultas.fecha', '>=', $value);
    }

    public function fecha_hasta($value): void
    {
        $this->builder->where('consultas.fecha', '<=', $value);
    }

    public function paciente_id($value): void
    {
        $this->builder->whereIn('consultas.paciente_id', $this->getValue($value));
    }

}
