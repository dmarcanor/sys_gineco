<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Creator;


final class PacienteCreatorRequest
{
    private $id;
    private $nombre;
    private $apellido;
    private $lugarNacimiento;
    private $gradoInstruccion;
    private $edad;
    private $fechaNacimiento;
    private $estadoCivil;
    private $motivoConsulta;
    private $telefono;
    private $dirrecion;

    public function __construct(
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
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->lugarNacimiento = $lugarNacimiento;
        $this->gradoInstruccion = $gradoInstruccion;
        $this->edad = $edad;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->estadoCivil = $estadoCivil;
        $this->motivoConsulta = $motivoConsulta;
        $this->telefono = $telefono;
        $this->dirrecion = $dirrecion;
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

    public function fechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }

    public function estadoCivil(): string
    {
        return $this->estadoCivil;
    }

    public function motivoConsulta(): string
    {
        return $this->motivoConsulta;
    }

    public function telefono(): string
    {
        return $this->telefono;
    }

    public function dirrecion(): string
    {
        return $this->dirrecion;
    }
}
