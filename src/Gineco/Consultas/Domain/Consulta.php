<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Consultas\Domain;

use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaCodigo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaId;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaIndicacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaMotivo;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaObservacion;
use SysGineco\Gineco\Consultas\Domain\ValueObjects\ConsultaReposoMedico;
use SysGineco\Gineco\Shared\Domain\ValueObjects\DateTimeValueObject;

final class Consulta
{
    CONST TABLE = 'consultas';
    CONST PREFIX = 'CON';

    private $id;
    private $pacienteId;
    private $codigo;
    private $fecha;
    private $observacion;
    private $indicacion;
    private $motivo;
    private $reposoMedico;
    private $createdAt;
    private $updatedAt;

    public function __construct(
        ConsultaId $id,
        string $pacienteId,
        ConsultaCodigo $codigo,
        DateTimeValueObject $fecha,
        ConsultaObservacion $observacion,
        ConsultaIndicacion $indicacion,
        ConsultaMotivo $motivo,
        ConsultaReposoMedico $reposoMedico,
        DateTimeValueObject $createdAt,
        DateTimeValueObject $updatedAt
    )
    {
        $this->id = $id;
        $this->pacienteId = $pacienteId;
        $this->codigo = $codigo;
        $this->fecha = $fecha;
        $this->observacion = $observacion;
        $this->indicacion = $indicacion;
        $this->motivo = $motivo;
        $this->reposoMedico = $reposoMedico;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public static function create(
        ConsultaId $id,
        string $pacienteId,
        ConsultaCodigo $codigo,
        DateTimeValueObject $fecha,
        ConsultaObservacion $observacion,
        ConsultaIndicacion $indicacion,
        ConsultaMotivo $motivo,
        ConsultaReposoMedico $reposoMedico
    ): self
    {
        return new self(
            $id,
            $pacienteId,
            $codigo,
            $fecha,
            $observacion,
            $indicacion,
            $motivo,
            $reposoMedico,
            new DateTimeValueObject(),
            new DateTimeValueObject()
        );
    }

    public static function fromDatabase(
        string $id,
        string $pacienteId,
        string $codigo,
        string $fecha,
        string $observacion,
        string $indicacion,
        string $motivo,
        string $reposoMedico,
        string $createdAt,
        string $updatedAt
    ): self
    {
        return new self(
            new ConsultaId($id),
            $pacienteId,
            new ConsultaCodigo($codigo),
            new DateTimeValueObject($fecha),
            new ConsultaObservacion($observacion),
            new ConsultaIndicacion($indicacion),
            new ConsultaMotivo($motivo),
            new ConsultaReposoMedico($reposoMedico),
            new DateTimeValueObject($createdAt),
            new DateTimeValueObject($updatedAt)
        );
    }

    public function id(): ConsultaId
    {
        return $this->id;
    }

    public function pacienteId(): string
    {
        return $this->pacienteId;
    }

    public function codigo(): ConsultaCodigo
    {
        return $this->codigo;
    }

    public function fecha(): DateTimeValueObject
    {
        return $this->fecha;
    }

    public function observacion(): ConsultaObservacion
    {
        return $this->observacion;
    }

    public function indicacion(): ConsultaIndicacion
    {
        return $this->indicacion;
    }

    public function motivo(): ConsultaMotivo
    {
        return $this->motivo;
    }

    public function reposoMedico(): ConsultaReposoMedico
    {
        return $this->reposoMedico;
    }

    public function createdAt(): DateTimeValueObject
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTimeValueObject
    {
        return $this->updatedAt;
    }

    public function updatePacienteId(string $pacienteId): void
    {
        if ($this->pacienteId === $pacienteId)
            return;

        $this->pacienteId = $pacienteId;
        $this->updatedAt = new DateTimeValueObject();
    }

    public function updateObservacion(ConsultaObservacion $observacion): void
    {
        if ($this->observacion->equals($observacion))
            return;

        $this->observacion = $observacion;
        $this->updatedAt = new DateTimeValueObject();
    }

    public function updateIndicacion(ConsultaIndicacion $indicacion): void
    {
        if ($this->indicacion->equals($indicacion))
            return;

        $this->indicacion = $indicacion;
        $this->updatedAt = new DateTimeValueObject();
    }

    public function updateMotivo(ConsultaMotivo $motivo): void
    {
        if ($this->motivo->equals($motivo))
            return;

        $this->motivo = $motivo;
        $this->updatedAt = new DateTimeValueObject();
    }

    public function updateReposoMedico(ConsultaReposoMedico $reposoMedico): void
    {
        if ($this->reposoMedico->equals($reposoMedico))
            return;

        $this->reposoMedico = $reposoMedico;
        $this->updatedAt = new DateTimeValueObject();
    }

    public function toResponse(): array
    {
        return [
            'id'            => $this->id()->value(),
            'codigo'        => $this->codigo()->value(),
            'paciente_id'   => $this->pacienteId(),
            'fecha'         => $this->fecha()->format('Y-m-d\TH:i'),
            'motivo'        => $this->motivo()->value(),
            'indicaciones'    => $this->indicacion()->value(),
            'observaciones'   => $this->observacion()->value(),
            'reposo'        => $this->reposoMedico()->value()
        ];
    }
}
