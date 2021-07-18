<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\Persistence;

use SysGineco\Gineco\Shared\Infrastructure\Persistence\MysqlQueryFilters;

final class MysqlPacienteFilters extends MysqlQueryFilters
{
    public function nombre($value):void
    {
        $this->builder->where('pacientes.nombre', 'like', "%{$value}%");
    }

    public function apellido($value):void
    {
        $this->builder->where('pacientes.apellido', 'like', "%{$value}%");
    }

    public function estado_civil($value):void
    {
        $this->builder->where('pacientes.estado_civil', $value);
    }
}
