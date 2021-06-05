<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Infrastruture\Persistence;

use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Domain\Entity\Paciente;

use Illuminate\Support\Facades\DB;

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
            'motivo_consulta' => $paciente->motivoConsulta(),
            'telefono' => $paciente->telefono(),
            'dirrecion' => $paciente->dirrecion(),
        ]);
    }
}
