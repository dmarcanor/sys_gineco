<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Pacientes\Application\Updater;


final class PacienteUpdaterRequest
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

    public function __construct(
        string $id,
        string $nombre,
        string $apellido,
        string $lugarNacimiento,
        string $gradoInstruccion,
        int $edad,
        string $fechaNacimiento,
        string $estadoCivil,
        string $observacion,
        string $telefono,
        string $direccion
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

}
