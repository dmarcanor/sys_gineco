<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\Persistence;

use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class MysqlPacienteRepository implements PacienteRepository
{

    public function create(Paciente $paciente): void
    {
        DB::table(Paciente::TABLE)->insert([
            'id' => $paciente->id(),
            'nombre' => $paciente->nombre(),
            'apellido' => $paciente->apellido(),
            'lugar_nacimiento' => $paciente->lugarNacimiento(),
            'grado_instruccion' => $paciente->gradoInstruccion(),
            'edad' => $paciente->edad(),
            'fecha_nacimiento' => $paciente->fechaNacimiento(),
            'estado_civil' => $paciente->estadoCivil(),
            'observacion' => $paciente->observacion(),
            'telefono' => $paciente->telefono(),
            'direccion' => $paciente->direccion(),
            'created_at' => $paciente->createdAt(),
            'updated_at' => $paciente->updatedAt()
        ]);
    }
    public function update(Paciente $paciente): void
    {
        DB::table(Paciente::TABLE)->where('id', '=', $paciente->id())->limit(1)
            ->update([
            'nombre' => $paciente->nombre(),
            'apellido' => $paciente->apellido(),
            'lugar_nacimiento' => $paciente->lugarNacimiento(),
            'grado_instruccion' => $paciente->gradoInstruccion(),
            'edad' => $paciente->edad(),
            'fecha_nacimiento' => $paciente->fechaNacimiento(),
            'estado_civil' => $paciente->estadoCivil(),
            'observacion' => $paciente->observacion(),
            'telefono' => $paciente->telefono(),
            'direccion' => $paciente->direccion(),
            'created_at' => $paciente->createdAt(),
            'updated_at' => $paciente->updatedAt()
        ]);
    }

    public function find(string $id): ?Paciente
    {
        $object = DB::table(Paciente::TABLE)->find($id);

        return empty($object) ? null : Paciente::fromDatabase(
            (string) $object->id,
            (string) $object->nombre,
            (string) $object->apellido,
            (string) $object->lugar_nacimiento,
            (string) $object->grado_instruccion,
            (int) $object->edad,
            (string) $object->fecha_nacimiento,
            (string) $object->estado_civil,
            (string) $object->observacion,
            (string) $object->telefono,
            (string) $object->direccion,
            (string) $object->created_at,
            (string) $object->updated_at
        );


    }

    public function searcherList(array $clause)
    {
        $query = DB::table(Paciente::TABLE);
        $query->where(function (Builder $builder) use($clause) {(new MysqlPacienteFilters())->apply($builder, $clause);});
        return $query->paginate(10);
    }
}
