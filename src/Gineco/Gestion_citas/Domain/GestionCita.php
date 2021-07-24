<?php
declare(strict_types=1);

namespace SysGineco\Gineco\Gestion_citas\Domain;

use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaCodigo;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEcografia;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaEstado;
use SysGineco\Gineco\Gestion_citas\Domain\ValueObjects\GestionCitaId;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;

final class GestionCita
{
    private $id;
    private $pacienteId;
    private $codigo;
    private $fecha;
    private $estado;
    private $ecografia;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        GestionCitaId           $id,
        string                  $pacienteId,
        GestionCitaCodigo       $codigo,
        DateTimeValueObject     $fecha,
        GestionCitaEstado       $estado,
        GestionCitaEcografia    $ecografia,
        DateTimeValueObject     $createdAt,
        DateTimeValueObject     $updatedAt
    )
    {
        $this->id           = $id;
        $this->pacienteId   = $pacienteId;
        $this->codigo       = $codigo;
        $this->fecha        = $fecha;
        $this->estado       = $estado;
        $this->ecografia    = $ecografia;
        $this->createdAt    = $createdAt;
        $this->updatedAt    = $updatedAt;
    }

    public static function create(
        GestionCitaId           $id,
        string                  $pacienteId,
        GestionCitaCodigo       $codigo,
        DateTimeValueObject     $fecha,
        GestionCitaEstado       $estado,
        GestionCitaEcografia    $ecografia
    ): self
    {
        return new self(
            $id,
            $pacienteId,
            $codigo,
            $fecha,
            $estado,
            $ecografia,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public static function fromDatabase(
        string $id,
        string $pacienteId,
        string $codigo,
        string $fecha,
        string $estado,
        string $ecografia,
        string $createdAt,
        string $updatedAt
    ): self
    {
        return new self(
            $id,
            $pacienteId,
            $codigo,
            $fecha,
            $estado,
            $ecografia,
            $createdAt,
            $updatedAt
        );
    }

    public function id(): GestionCitaId
    {
        return $this->id;
    }

    public function pacienteId(): string
    {
        return $this->pacienteId;
    }

    public function codigo(): GestionCitaCodigo
    {
        return $this->codigo;
    }

    public function fecha(): DateTimeValueObject
    {
        return $this->fecha;
    }

    public function estado(): GestionCitaEstado
    {
        return $this->estado;
    }

    public function ecografia(): GestionCitaEcografia
    {
        return $this->ecografia;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }
}
