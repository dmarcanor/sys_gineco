<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Pacientes\Domain\Entity;

use Carbon\Carbon;

final class Paciente
{
    private $id;
    private $nombre;
    private $apellido;
    private $lugarNacimiento;
    private $gradoInstruccion;
    private $edad;
    private $fechaNacimiento;
    private $estadoCivil;
    private $observacion;
    private $telefono;
    private $direccion;
    private $createdAt;
    private $updatedAt;

    const TABLE = "pacientes";

    private function __construct(
        string $id,
        string $nombre,
        string $apellido,
        string $lugarNacimiento,
        string $gradoInstruccion,
        int $edad,
        Carbon $fechaNacimiento,
        string $estadoCivil,
        string $observacion,
        string $telefono,
        string $direccion,
        Carbon $createdAt,
        Carbon $updatedAt
    )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->lugarNacimiento = $lugarNacimiento;
        $this->gradoInstruccion = $gradoInstruccion;
        $this->edad = $edad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->estadoCivil = $estadoCivil;
        $this->observacion = $observacion;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        string $id,
        string $nombre,
        string $apellido,
        string $lugarNacimiento,
        string $gradoInstruccion,
        int $edad,
        string $fechaNacimiento,
        string $estadoCivil,
        string $motivoConsulta,
        string $telefono,
        string $direccion
    )
    {
        return new self(
            $id,
            $nombre,
            $apellido,
            $lugarNacimiento,
            $gradoInstruccion,
            $edad,
            Carbon::createFromFormat('Y-m-d', $fechaNacimiento)->startOfDay(),
            $estadoCivil,
            $motivoConsulta,
            $telefono,
            $direccion,
            Carbon::now(),
            Carbon::now()
        );
    }

    public static function fromDatabase(
        string $id,
        string $nombre,
        string $apellido,
        string $lugarNacimiento,
        string $gradoInstruccion,
        int $edad,
        string $fechaNacimiento,
        string $estadoCivil,
        string $motivoConsulta,
        string $telefono,
        string $direccion,
        string $createdAt,
        string $updatedAt
    ): self
    {
        return new self(

            $id,
            $nombre,
            $apellido,
            $lugarNacimiento,
            $gradoInstruccion,
            $edad,
            Carbon::createFromFormat('Y-m-d H:m:s', $fechaNacimiento),
            $estadoCivil,
            $motivoConsulta,
            $telefono,
            $direccion,
            Carbon::createFromFormat('Y-m-d H:m:s', $createdAt),
            Carbon::createFromFormat('Y-m-d H:m:s', $updatedAt)
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function apellido(): string
    {
        return $this->apellido;
    }

    public function lugarNacimiento(): string
    {
        return $this->lugarNacimiento;
    }

    public function gradoInstruccion(): string
    {
        return $this->gradoInstruccion;
    }

    public function edad(): int
    {
        return $this->edad;
    }

    public function fechaNacimiento(): Carbon
    {
        return $this->fechaNacimiento;
    }

    public function estadoCivil(): string
    {
        return $this->estadoCivil;
    }

    public function observacion(): string
    {
        return $this->observacion;
    }

    public function telefono(): string
    {
        return $this->telefono;
    }

    public function direccion(): string
    {
        return $this->direccion;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }

    public function updatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    public function changeNombre(string $nombreNew): void
    {
        if($this->nombre === $nombreNew) return;

        $this->nombre = $nombreNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeApellido(string $apellidoNew): void
    {
        if($this->apellido === $apellidoNew) return;

        $this->apellido = $apellidoNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeLugarNacimiento(string $lugarNacimientoNew): void
    {
        if($this->lugarNacimiento === $lugarNacimientoNew) return;

        $this->lugarNacimiento = $lugarNacimientoNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeGradoInstruccion(string $gradoInstruccionNew): void
    {
        if($this->gradoInstruccion === $gradoInstruccionNew) return;

        $this->gradoInstruccion = $gradoInstruccionNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeEdad(int $edadNew): void
    {
        if($this->edad === $edadNew) return;

        $this->edad = $edadNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeFechaNacimiento(string $fechaNacimientoNew): void
    {
        $fechaNacimientoNew = Carbon::createFromFormat('Y-m-d', $fechaNacimientoNew)->startOfDay();
        if($this->fechaNacimiento === $fechaNacimientoNew) return;

        $this->fechaNacimiento = $fechaNacimientoNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeEstadoCivil(string $estadoCivilNew): void
    {
        if($this->estadoCivil === $estadoCivilNew) return;

        $this->estadoCivil = $estadoCivilNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeObservacion(string $observacionNew): void
    {
        if($this->observacion === $observacionNew) return;

        $this->observacion = $observacionNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeTelefono(string $telefonoNew): void
    {
        if($this->telefono === $telefonoNew) return;

        $this->telefono = $telefonoNew;
        $this->updatedAt = $this->CurrentDate();
    }

    public function changeDireccion(string $direccionNew): void
    {
        if($this->direccion === $direccionNew) return;

        $this->direccion = $direccionNew;
        $this->updatedAt = $this->CurrentDate();
    }

    private function CurrentDate(): Carbon
    {
        return Carbon::now()->timezone('America/Caracas');
    }
}
