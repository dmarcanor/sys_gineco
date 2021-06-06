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
    private $dirrecion;
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
        string $dirrecion,
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
        $this->dirrecion = $dirrecion;
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
        string $dirrecion
    )
    {
        return new self(
            $id,
            $nombre,
            $apellido,
            $lugarNacimiento,
            $gradoInstruccion,
            $edad,
            Carbon::createFromFormat('Y-m-d', $fechaNacimiento),
            $estadoCivil,
            $motivoConsulta,
            $telefono,
            $dirrecion,
            Carbon::now(),
            Carbon::now()
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

    public function dirrecion(): string
    {
        return $this->dirrecion;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }

    public function updatedAt(): Carbon
    {
        return $this->updatedAt;
    }

}
